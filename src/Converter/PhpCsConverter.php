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
use Bartlett\Sarif\Definition\PhysicalLocation;
use Bartlett\Sarif\Definition\PropertyBag;
use Bartlett\Sarif\Definition\ReportingDescriptor;
use Bartlett\Sarif\Definition\Result;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Reports\Report;

use function array_count_values;
use function getcwd;
use function max;
use function strtolower;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class PhpCsConverter extends AbstractConverter implements Report
{
    protected const TOOL_NAME = 'PHP_CodeSniffer';
    protected const TOOL_SHORT_DESCRIPTION = 'Detects violations of a defined set of coding standards.';
    protected const TOOL_FULL_DESCRIPTION = 'PHP_CodeSniffer tokenizes PHP, JavaScript and CSS files and detects violations of a defined set of coding standards.';
    protected const TOOL_INFO_URI = 'https://github.com/PHPCSStandards/PHP_CodeSniffer';
    protected const TOOL_COMPOSER_PACKAGE = 'squizlabs/php_codesniffer';

    public function rules(): array
    {
        $rules = [];

        foreach (array_count_values($this->rules) as $source => $frequency) {
            $properties = new PropertyBag();
            $properties->addProperty('frequency', $frequency);
            $rule = new ReportingDescriptor($source);
            $rule->setProperties($properties);
            $rules[] = $rule;
        }

        return $rules;
    }

    public function generateFileReport($report, File $phpcsFile, $showSources = false, $width = 80): bool
    {
        if ($report['errors'] === 0 && $report['warnings'] === 0) {
            // Nothing to print.
            return false;
        }

        $artifactLocation = new ArtifactLocation();
        $artifactLocation->setUri($this->pathToArtifactLocation($report['filename']));
        $artifactLocation->setUriBaseId('WORKINGDIR');

        $surroundingLines = 2;

        foreach ($report['messages'] as $line => $lineErrors) {
            foreach ($lineErrors as $column => $colErrors) {
                foreach ($colErrors as $error) {
                    $result = new Result(new Message($error['message']));

                    $physicalLocation = new PhysicalLocation($artifactLocation);
                    $region = $this->getSnippetRegion($phpcsFile->getFilename(), $line, $column, 0, 0);
                    $physicalLocation->setRegion($region);

                    $startLine = max($line - $surroundingLines, 1);
                    $contextRegion = $this->getSnippetRegion(
                        $phpcsFile->getFilename(),
                        $startLine,
                        null,
                        0,
                        $surroundingLines * 2
                    );
                    $contextRegion->setEndLine($line + $surroundingLines);
                    $physicalLocation->setContextRegion($contextRegion);

                    $location = new Location();
                    $location->setPhysicalLocation($physicalLocation);

                    $result->addLocations([$location]);

                    $properties = new PropertyBag();
                    $properties->addProperty('severity', strtolower($error['type']));
                    $properties->addProperty('fixable', $error['fixable']);

                    $result->setProperties($properties);
                    $result->setRuleId($error['source']);

                    $this->results[] = $result;
                    $this->rules[] = $error['source'];
                }
            }
        }

        return true;
    }

    public function generate(
        $cachedData,
        $totalFiles,
        $totalErrors,
        $totalWarnings,
        $totalFixable,
        $showSources = false,
        $width = 80,
        $interactive = false,
        $toScreen = true
    ) {
        $properties = new PropertyBag();
        $properties->addProperty('totals.files', $totalFiles);
        $properties->addProperty('totals.errors', $totalErrors);
        $properties->addProperty('totals.warnings', $totalWarnings);
        $properties->addProperty('totals.fixable', $totalFixable);

        $run = $this->run($this->invocations($properties));

        $workingDir = new ArtifactLocation();
        $workingDir->setUri($this->pathToUri(getcwd() . '/'));
        $originalUriBaseIds = [
            'WORKINGDIR' => $workingDir,
        ];
        $run->addAdditionalProperties($originalUriBaseIds);

        echo $this->sarifLog([$run]);
    }
}
