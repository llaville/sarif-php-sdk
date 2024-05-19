<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Converter;

use Bartlett\Sarif\Definition\ArtifactLocation;
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;
use Bartlett\Sarif\Definition\ToolComponent;

use Overtrue\PHPLint\Output\LinterOutput;

use function getcwd;
use function hash_file;
use function sprintf;
use function str_replace;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class PhpLintConverter extends AbstractConverter
{
    protected const TOOL_NAME = 'PHPLint';
    protected const TOOL_SHORT_DESCRIPTION = 'Syntax check only (lint) of PHP files';
    protected const TOOL_FULL_DESCRIPTION = 'PHPLint is a tool that can speed up linting of php files by running several lint processes at once.';
    protected const TOOL_INFO_URI = 'https://github.com/overtrue/phplint';
    protected const TOOL_COMPOSER_PACKAGE = 'overtrue/phplint';

    protected const DEFAULT_HELP_URI = 'https://www.php.net/manual/en/features.commandline.options.php';

    public function toolDriver(): ToolComponent
    {
        $this->toolFullName = sprintf(
            '%s version %s by overtrue and contributors',
            self::TOOL_NAME,
            $this->toolSemanticVersion
        );
        return parent::toolDriver();
    }

    public function rules(): array
    {
        $rule = new ReportingDescriptor('CS101');
        $rule->setShortDescription(new MultiformatMessageString('Syntax error'));
        $rule->setFullDescription(new MultiformatMessageString('Syntax error detected when lint a file'));
        $rule->setHelp(new MultiformatMessageString(self::DEFAULT_HELP_URI));
        $rule->setHelpUri('https://www.php.net/manual/en/langref.php');

        return [
            $rule,
        ];
    }

    public function invocations(?PropertyBag $properties = null): array
    {
        $invocations = parent::invocations($properties);

        $arguments = $GLOBALS['argv'];
        $responseFileOption = '--log-sarif=';
        foreach ($arguments as $argument) {
            if (strpos($argument, $responseFileOption) === 0) {
                $responseFile = new ArtifactLocation();
                $responseFile->setDescription(new Message('Log scan results to a file'));
                $responseFile->setUri($this->pathToUri(str_replace($responseFileOption, '', $argument)));
                $invocations[0]->addResponseFiles([$responseFile]);
            }
        }

        return $invocations;
    }

    public function format(LinterOutput $results): string
    {
        $failures = $results->getFailures();

        foreach ($failures as $file => $failure) {
            $fingerprints = hash_file('sha256', $file);

            $result = new Result(new Message($failure['error']));
            $result->addPartialFingerprints(['syntaxError' => $fingerprints]);

            $artifactLocation = new ArtifactLocation();
            $artifactLocation->setUri($this->pathToArtifactLocation($file));
            $artifactLocation->setUriBaseId('WORKINGDIR');

            $location = new Location();
            $physicalLocation = new PhysicalLocation($artifactLocation);
            $physicalLocation->setRegion(new Region($failure['line']));
            $location->setPhysicalLocation($physicalLocation);
            $result->addLocations([$location]);
            $result->setRuleId('CS101');

            $this->results[] = $result;
        }

        $run = $this->run($this->invocations());

        $workingDir = new ArtifactLocation();
        $workingDir->setUri($this->pathToUri(getcwd() . '/'));
        $originalUriBaseIds = [
            'WORKINGDIR' => $workingDir,
        ];
        $run->addAdditionalProperties($originalUriBaseIds);

        return $this->sarifLog([$run]);
    }
}
