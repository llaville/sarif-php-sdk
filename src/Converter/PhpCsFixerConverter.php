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
use Bartlett\Sarif\Definition\Location;
use Bartlett\Sarif\Definition\Message;
use Bartlett\Sarif\Definition\MultiformatMessageString;
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\Region;
use Bartlett\Sarif\Definition\ReportingConfiguration;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;

use Bartlett\Sarif\Definition\RunAutomationDetails;
use Bartlett\Sarif\Definition\ToolComponent;
use PhpCsFixer\Console\Report\FixReport\ReporterInterface;
use PhpCsFixer\Console\Report\FixReport\ReportSummary;

use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use function array_count_values;
use function array_keys;
use function asort;
use function hash_file;
use function round;
use function str_replace;

/**
 * @author Laurent Laville
 * @since Release 1.3.0
 */
class PhpCsFixerConverter extends AbstractConverter implements ReporterInterface
{
    protected const TOOL_NAME = 'PHP-CS-Fixer';
    protected const TOOL_SHORT_DESCRIPTION = '';
    protected const TOOL_FULL_DESCRIPTION = 'A tool to automatically fix PHP Coding Standards issues';
    protected const TOOL_INFO_URI = 'https://github.com/PHP-CS-Fixer/PHP-CS-Fixer';
    protected const TOOL_COMPOSER_PACKAGE = 'friendsofphp/php-cs-fixer';

    protected const DEFAULT_HELP_URI = 'https://cs.symfony.com/';
    protected const DEFAULT_NO_RULE_DESCRIPTION = 'There is no description of Fixer and benefit of using it';

    public function toolDriver(): ToolComponent
    {
        $driver = parent::toolDriver();
        $driver->setFullName('PHP-CS-Fixer SARIF reporter');
        return $driver;
    }

    public function rules(): array
    {
        $rules = [];

        $frequencies = array_count_values(array_keys($this->rules));
        asort($frequencies);
        $rank = 0;

        foreach ($frequencies as $source => $frequency) {
            $rule = new ReportingDescriptor($source);
            $name = str_replace('_', '', \ucwords($source, '_'));
            $rule->setName($name);

            $rule->setShortDescription(new MultiformatMessageString($this->rules[$source]['description']['short']));
            $fullDescription = $this->rules[$source]['description']['full'] ?? self::DEFAULT_NO_RULE_DESCRIPTION;
            $rule->setFullDescription(new MultiformatMessageString($fullDescription));

            $defaultConfiguration = new ReportingConfiguration();
            $defaultConfiguration->setEnabled(true);
            $defaultConfiguration->setLevel('warning');
            $defaultConfiguration->setRank(++$rank);

            $rule->setHelp(new MultiformatMessageString(self::DEFAULT_HELP_URI));
            $rule->setHelpUri($this->rules[$source]['helpUri']);
            $rule->setDefaultConfiguration($defaultConfiguration);

            $properties = new PropertyBag();
            $properties->addProperty('frequency', $frequency);
            $properties->addProperty('risky', $this->rules[$source]['description']['risky']);
            $rule->setProperties($properties);

            $rules[] = $rule;
        }

        return $rules;
    }

    public function getFormat(): string
    {
        return 'sarif';
    }

    public function generate(ReportSummary $reportSummary): string
    {
        foreach ($reportSummary->getChanged() as $filePath => $fixResult) {
            $artifactLocation = new ArtifactLocation();
            $artifactLocation->setUri($filePath);
            $artifactLocation->setUriBaseId('SRC_ROOT');

            //$artifactContent = new ArtifactContent();
            //$artifactContent->setRendered(new MultiformatMessageString($fixResult['diff']));

            $region = new Region(1);
            //$region->setSnippet($artifactContent);

            $physicalLocation = new PhysicalLocation($artifactLocation);
            $physicalLocation->setRegion($region);

            $location = new Location();
            $location->setPhysicalLocation($physicalLocation);

            $fingerprints = hash_file('sha256', $filePath);

            foreach ($fixResult['appliedFixers'] as $appliedFixer) {
                $message = new Message('Found violation(s) of type: {0}');
                $message->addArguments([$appliedFixer]);

                $result = new Result($message);
                $result->setRuleId($appliedFixer);
                $result->addLocations([$location]);
                $result->addPartialFingerprints([$appliedFixer => $fingerprints]);

                $this->results[] = $result;

                $extraInfoFixers = $fixResult['extraInfoFixers'] ?? [];

                if (!empty($extraInfoFixers)) {
                    /** @var FixerDefinitionInterface $fixerDefinition */
                    $fixerDefinition = $extraInfoFixers[$appliedFixer]['definition'];

                    $descriptions = [
                        'short' => $fixerDefinition->getSummary(),
                        'full' => $fixerDefinition->getDescription(),
                        'risky' => $extraInfoFixers[$appliedFixer]['risky'],
                    ];
                    $this->rules[$appliedFixer] = [
                        'description' => $descriptions,
                        'helpUri' => $extraInfoFixers[$appliedFixer]['helpUri'],
                    ];
                }
            }
        }

        $properties = new PropertyBag();
        $properties->addProperty('time', [
            'total' => round($reportSummary->getTime() / 1_000, 3),
            'unit' => 'sec'
        ]);
        $properties->addProperty('memory', [
            'consumed' => round($reportSummary->getMemory() / 1_024 / 1_024, 3),
            'unit' => 'Mb',
        ]);

        $run = $this->run($this->invocations($properties));

        $srcRoot = new ArtifactLocation();
        $srcRoot->setUri($this->pathToUri(\getenv('SRC_ROOT', true) ? : '/shared/backups/bartlett/sarif-php-sdk/'));
        $originalUriBaseIds = [
            'SRC_ROOT' => $srcRoot,
        ];
        $run->addAdditionalProperties($originalUriBaseIds);

        //@todo need to extract to AbstractConverter ???
        $automationDetails = new RunAutomationDetails();
        $automationDetails->setId('daily run '. \date(\DATE_ATOM));

        $run->setAutomationDetails($automationDetails);

        return $this->sarifLog([$run]);
    }
}
