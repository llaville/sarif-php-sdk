<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Converter;

use Bartlett\Sarif\Definition\ArtifactContent;
use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\RunAutomationDetails;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Factory\PhpSerializerFactory;
use Bartlett\Sarif\Factory\SerializerFactory;
use Bartlett\Sarif\SarifLog;
use Bartlett\Sarif\Serializer\SerializerInterface;

use Composer\InstalledVersions;

use PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor;
use PHP_Parallel_Lint\PhpConsoleHighlighter\Highlighter;

use RuntimeException;
use Throwable;
use function array_intersect;
use function array_slice;
use function array_unshift;
use function count;
use function date;
use function explode;
use function file_get_contents;
use function getcwd;
use function implode;
use function parse_url;
use function sprintf;
use function str_replace;
use function strlen;
use function substr;
use function trim;
use const DATE_ATOM;
use const DIRECTORY_SEPARATOR;
use const PHP_URL_SCHEME;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
abstract class AbstractConverter implements ConverterInterface
{
    protected string $toolName;
    protected string $toolShortDescription;
    protected string $toolFullDescription;
    protected string $toolInformationUri;
    protected string $toolSemanticVersion;

    /**
     * @var ReportingDescriptor[]|string[]
     */
    protected array $rules = [];

    /**
     * @var Result[]
     */
    protected array $results = [];

    protected SerializerInterface $serializer;

    public function __construct(?SerializerFactory $factory = null)
    {
        $this->toolSemanticVersion = $this->getToolVersion(static::TOOL_COMPOSER_PACKAGE);

        $factory ??= new PhpSerializerFactory();
        $this->serializer = $factory->createSerializer();
    }

    public function toolDriver(): ToolComponent
    {
        $driver = new ToolComponent($this->toolName ?? static::TOOL_NAME);
        $driver->setInformationUri($this->toolInformationUri ?? static::TOOL_INFO_URI);
        $driver->setSemanticVersion($this->toolSemanticVersion);

        $shortDescription = $this->toolShortDescription ?? static::TOOL_SHORT_DESCRIPTION;
        if (!empty($shortDescription)) {
            $driver->setShortDescription(new MultiformatMessageString($shortDescription));
        }

        $fullDescription = $this->toolFullDescription ?? static::TOOL_FULL_DESCRIPTION;
        if (!empty($fullDescription)) {
            $driver->setFullDescription(new MultiformatMessageString($fullDescription));
        }

        return $driver;
    }

    /**
     * @inheritDoc
     */
    public function toolExtensions(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return $this->rules;
    }

    /**
     * @inheritDoc
     */
    final public function sarifLog(array $runs = [], string $version = '2.1.0'): ?string
    {
        $log = new SarifLog($runs, $version);

        return $this->serializer->serialize($log, 'json');
    }

    /**
     * @inheritDoc
     */
    public function invocations(?PropertyBag $properties = null): array
    {
        $workingDir = new ArtifactLocation();
        $workingDir->setUri($this->pathToUri(getcwd() . '/'));

        $invocation = new Invocation(true);
        $invocation->setWorkingDirectory($workingDir);

        if ($properties !== null) {
            $invocation->setProperties($properties);
        }

        return [$invocation];
    }

    public function automationDetails(): RunAutomationDetails
    {
        $automationDetails = new RunAutomationDetails();
        $automationDetails->setId('Daily run '. date(DATE_ATOM));

        return $automationDetails;
    }

    /**
     * @inheritDoc
     */
    final public function run(array $invocations): Run
    {
        $driver = $this->toolDriver();
        $driver->addRules($this->rules());

        $tool = new Tool($driver);
        $tool->addExtensions($this->toolExtensions());

        $run = new Run($tool);

        $run->addInvocations($invocations);
        $run->addResults($this->results);
        $run->setAutomationDetails($this->automationDetails());

        return $run;
    }

    protected function getToolVersion(string $package): string
    {
        $toolVersion = InstalledVersions::getVersion($package);

        if (null === $toolVersion) {
            throw new RuntimeException(
                sprintf('%s requires to have %s installed.', __CLASS__, static::TOOL_NAME)
            );
        }

        return $toolVersion;
    }

    /**
     * Returns path to resource (file) scanned.
     */
    protected function pathToArtifactLocation(string $path): string
    {
        $workingDir = getcwd();
        if ($workingDir === false) {
            $workingDir = '.';
        }
        if (substr($path, 0, strlen($workingDir)) === $workingDir) {
            // have common path
            return substr($path, strlen($workingDir) + 1);
        }

        // make $path relative to working directory
        $cwd = explode('/', trim($workingDir, '/'));
        $rPath = explode('/', trim($path, '/'));
        $commonParts = array_intersect($cwd, $rPath);

        $relativeCwd = array_slice($cwd, count($commonParts));
        $relativePath = array_slice($rPath, count($commonParts));

        foreach ($relativeCwd as $item) {
            array_unshift($relativePath,  '..');
        }
        return implode('/', $relativePath);
    }

    /**
     * Returns path to resource (file) scanned with protocol.
     */
    protected function pathToUri(string $path): string
    {
        if (parse_url($path, PHP_URL_SCHEME) !== null) {
            // already a URL
            return $path;
        }

        $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);

        // file:///C:/... on Windows systems
        if (substr($path, 0, 1) !== '/') {
            $path = '/' . $path;
        }

        return 'file://' . $path;
    }

    /**
     * Provides code snippet.
     *
     * Only if `php-parallel-lint/php-console-highlighter` package is installed
     * @link https://packagist.org/packages/php-parallel-lint/php-console-highlighter
     */
    protected function getCodeSnippet(string $filePath, int $lineNumber, int $linesBefore, int $linesAfter): ?string
    {
        if (InstalledVersions::isInstalled('php-parallel-lint/php-console-highlighter') === false) {
            return null;
        }

        try {
            $highlighter = new Highlighter(new ConsoleColor());
            $fileContent = file_get_contents($filePath);
            $snippet = $highlighter->getCodeSnippet($fileContent, $lineNumber, $linesBefore, $linesAfter);
        } catch (Throwable $exception) {
            $snippet = null;
        }
        return $snippet;
    }

    protected function getSnippetRegion(
        string $filePath,
        int $lineNumber,
        ?int $column = null,
        int $linesBefore = 2,
        int $linesAfter = 2
    ): Region {
        $region = new Region($lineNumber, $column);

        $snippet = $this->getCodeSnippet($filePath, $lineNumber, $linesBefore, $linesAfter);

        if ($snippet !== null) {
            $artifactContent = new ArtifactContent();
            $artifactContent->setRendered(new MultiformatMessageString($snippet));
            $region->setSnippet($artifactContent);
        }

        return $region;
    }
}
