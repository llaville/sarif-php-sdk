<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Converter;

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Invocation;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\Run;
use Bartlett\Sarif\Definition\Tool;
use Bartlett\Sarif\Definition\ToolComponent;
use Bartlett\Sarif\Factory\PhpSerializerFactory;
use Bartlett\Sarif\Factory\SerializerFactory;
use Bartlett\Sarif\SarifLog;
use Bartlett\Sarif\Serializer\SerializerInterface;

use Composer\InstalledVersions;

use RuntimeException;
use function getcwd;
use function parse_url;
use function sprintf;
use function str_replace;
use function strlen;
use function substr;
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
            // relative path
            return substr($path, strlen($workingDir) + 1);
        }

        // absolute path with protocol
        return $this->pathToUri($path);
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
}
