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

use PHPMD\ProcessingError;
use PHPMD\Report;
use PHPMD\RuleViolation;

use function array_map;
use function hash_file;
use function implode;
use function str_replace;
use function trim;

/**
 * @author Laurent Laville
 * @since Release 1.4.0
 */
class PhpMdConverter extends AbstractConverter
{
    protected const TOOL_NAME = 'PHPMD';
    protected const TOOL_SHORT_DESCRIPTION = 'Tool with aims to be a PHP equivalent of the well known Java tool PMD';
    protected const TOOL_FULL_DESCRIPTION = 'PHPMD is a spin-off project of PHP Depend and aims to be a PHP equivalent of the well known Java tool PMD.';
    protected const TOOL_INFO_URI = 'https://github.com/phpmd/phpmd';
    protected const TOOL_COMPOSER_PACKAGE = 'phpmd/phpmd';

    public function rules(): array
    {
        $rules = [];

        /** @var RuleViolation $violation */
        foreach ($this->rules as $violation) {
            $rule = $violation->getRule();
            $ruleRef = str_replace(' ', '', $rule->getRuleSetName()) . '/' . $rule->getName();

            if (isset($this->rules[$ruleRef])) {
                continue;
            }

            $ruleObject = new ReportingDescriptor($ruleRef);
            $ruleObject->setName($rule->getName());
            $ruleObject->setShortDescription(new MultiformatMessageString($rule->getRuleSetName() . ': ' . $rule->getName()));
            $ruleObject->addMessageStrings(array(
                'default' => new MultiformatMessageString(trim($rule->getMessage())),
            ));
            $ruleObject->setHelpUri($rule->getExternalInfoUrl());
            $properties = new PropertyBag();
            $properties->addProperty('ruleSet', $rule->getRuleSetName());
            $properties->addProperty('priority', $rule->getPriority());

            $helpText = trim(str_replace("\n", ' ', $rule->getDescription()));
            $help = new MultiformatMessageString($helpText);

            $examples = $rule->getExamples();
            if (!empty($examples)) {
                $help->setMarkdown(
                    $helpText .
                    "\n\n### Example\n\n```php\n" .
                    implode("\n```\n\n```php\n", array_map('trim', $examples)) . "\n```"
                );
            }
            $ruleObject->setHelp($help);

            $since = $rule->getSince();
            if ($since) {
                $properties->addProperty('since', 'PHPMD ' . $since);
            }
            $ruleObject->setProperties($properties);

            $rules[$ruleRef] = $ruleObject;
        }

        return $rules;
    }

    public function generateReport(Report $report): ?string
    {
        $this->addViolations($report->getRuleViolations());
        $this->addErrors($report->getErrors());

        $run = $this->run($this->invocations());

        $workingDir = new ArtifactLocation();
        $workingDir->setUri($this->pathToUri(getcwd() . '/'));
        $originalUriBaseIds = [
            'WORKINGDIR' => $workingDir,
        ];
        $run->addAdditionalProperties($originalUriBaseIds);

        return $this->sarifLog([$run]);
    }

    /**
     * Add violations, if any, to the report data
     *
     * @param RuleViolation[] $violations The report with potential violations.
     */
    protected function addViolations(iterable $violations): void
    {
        foreach ($violations as $violation) {
            $rule = $violation->getRule();
            $ruleRef = str_replace(' ', '', $rule->getRuleSetName()) . '/' . $rule->getName();
            $this->rules[] = $violation;

            $arguments = $violation->getArgs();
            if ($arguments === null) {
                $arguments = [];
            }

            $message = new Message($violation->getDescription(), 'default');
            $message->addArguments(array_map('strval', $arguments));

            $result = new Result($message);
            $result->setRuleId($ruleRef);

            $fingerprints = hash_file('sha256', $violation->getFileName());
            $result->addPartialFingerprints(['ruleViolation' => $fingerprints]);

            $artifactLocation = new ArtifactLocation();
            $artifactLocation->setUri($this->pathToArtifactLocation($violation->getFileName()));
            $location = new Location();
            $physicalLocation = new PhysicalLocation($artifactLocation);
            $physicalLocation->setRegion(new Region($violation->getBeginLine(), null, $violation->getEndLine()));
            $location->setPhysicalLocation($physicalLocation);
            $result->addLocations([$location]);

            $this->results[] = $result;
        }
    }

    /**
     * Add errors, if any, to the report data
     *
     * @param ProcessingError[] $errors The report with potential errors.
     */
    protected function addErrors(iterable $errors): void
    {
        foreach ($errors as $error) {
            $result = new Result(new Message($error->getMessage()));
            $result->setLevel('error');

            $fingerprints = hash_file('sha256', $error->getFile());
            $result->addPartialFingerprints(['processingError' => $fingerprints]);

            $artifactLocation = new ArtifactLocation();
            $artifactLocation->setUri($this->pathToArtifactLocation($error->getFile()));
            $location = new Location();
            $physicalLocation = new PhysicalLocation($artifactLocation);
            $location->setPhysicalLocation($physicalLocation);
            $result->addLocations(array($location));

            $this->results[] = $result;
        }
    }
}
