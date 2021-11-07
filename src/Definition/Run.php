<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Addresses;
use Bartlett\Sarif\Property\Artifacts;
use Bartlett\Sarif\Property\AutomationDetails;
use Bartlett\Sarif\Property\BaselineGuid;
use Bartlett\Sarif\Property\ColumnKind;
use Bartlett\Sarif\Property\ConversionProcess;
use Bartlett\Sarif\Property\DefaultEncoding;
use Bartlett\Sarif\Property\DefaultSourceLanguage;
use Bartlett\Sarif\Property\ExternalPropertyFileReferencesInlined;
use Bartlett\Sarif\Property\Graphs;
use Bartlett\Sarif\Property\Invocations;
use Bartlett\Sarif\Property\Language;
use Bartlett\Sarif\Property\LogicalLocations;
use Bartlett\Sarif\Property\NewlineSequences;
use Bartlett\Sarif\Property\OriginalUriBaseIds;
use Bartlett\Sarif\Property\Policies;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\RedactionTokens;
use Bartlett\Sarif\Property\Results;
use Bartlett\Sarif\Property\RunAggregates;
use Bartlett\Sarif\Property\SpecialSignificanceLocations;
use Bartlett\Sarif\Property\Taxonomies;
use Bartlett\Sarif\Property\ThreadFlowLocations;
use Bartlett\Sarif\Property\ToolPipeline;
use Bartlett\Sarif\Property\Translations;
use Bartlett\Sarif\Property\VersionControlProvenance;
use Bartlett\Sarif\Property\WebRequests;
use Bartlett\Sarif\Property\WebResponses;
use function array_merge;

/**
 * Describes a single run of an analysis tool, and contains the reported output of that run.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317484
 * @author Laurent Laville
 */
final class Run extends JsonSerializable
{
    /**
     * Information about the tool or tool pipeline that generated the results in this run.
     * A run can only contain results produced by a single tool or tool pipeline.
     * A run can aggregate results from multiple log files,
     * as long as context around the tool run (tool command-line arguments and the like) is identical for all aggregated files.
     */
    use ToolPipeline;

    /**
     * Describes the invocation of the analysis tool.
     */
    use Invocations;

    /**
     * A conversion object that describes how a converter transformed an analysis tool's native reporting format
     * into the SARIF format.
     */
    use ConversionProcess;

    /**
     * The language of the messages emitted into the log file during this run
     * (expressed as an ISO 639-1 two-letter lowercase culture code)
     * and an optional region
     * (expressed as an ISO 3166-1 two-letter uppercase subculture code associated with a country or region).
     * The casing is recommended but not required (in order for this data to conform to RFC5646).
     */
    use Language;

    /**
     * Specifies the revision in version control of the artifacts that were scanned.
     */
    use VersionControlProvenance;

    /**
     * The artifact location specified by each uriBaseId symbol on the machine where the tool originally ran.
     */
    use OriginalUriBaseIds;

    /**
     * An array of artifact objects relevant to the run.
     */
    use Artifacts;

    /**
     * An array of logical locations such as namespaces, types or functions.
     */
    use LogicalLocations;

    /**
     * An array of zero or more unique graph objects associated with the run.
     */
    use Graphs;

    /**
     * The set of results contained in an SARIF log.
     * The results array can be omitted when a run is solely exporting rules metadata.
     * It must be present (but may be empty) if a log file represents an actual scan.
     */
    use Results;

    /**
     * Automation details that describe this run.
     */
    use AutomationDetails;

    /**
     * Automation details that describe the aggregate of runs to which this run belongs.
     */
    use RunAggregates;

    /**
     * The 'guid' property of a previous SARIF 'run' that comprises the baseline that was used
     * to compute result 'baselineState' properties for the run.
     */
    use BaselineGuid;

    /**
     * An array of strings used to replace sensitive information in a redaction-aware property.
     */
    use RedactionTokens;

    /**
     * Specifies the default encoding for any artifact object that refers to a text file.
     */
    use DefaultEncoding;

    /**
     * Specifies the default source language for any artifact object that refers to a text file that contains source code.
     */
    use DefaultSourceLanguage;

    /**
     * An ordered list of character sequences that were treated as line breaks when computing region information for the run.
     */
    use NewlineSequences;

    /**
     * Specifies the unit in which the tool measures columns.
     */
    use ColumnKind;

    /**
     * References to external property files that should be inlined with the content of a root log file.
     */
    use ExternalPropertyFileReferencesInlined;

    /**
     * An array of threadFlowLocation objects cached at run level.
     */
    use ThreadFlowLocations;

    /**
     * An array of toolComponent objects relevant to a taxonomy in which results are categorized.
     */
    use Taxonomies;

    /**
     * Addresses associated with this run instance, if any.
     */
    use Addresses;

    /**
     * The set of available translations of the localized data provided by the tool.
     */
    use Translations;

    /**
     * Contains configurations that may potentially override both
     * reportingDescriptor.defaultConfiguration (the tool's default severities)
     * and invocation.configurationOverrides (severities established at run-time from the command line).
     */
    use Policies;

    /**
     * An array of request objects cached at run level.
     */
    use WebRequests;

    /**
     * An array of response objects cached at run level.
     */
    use WebResponses;

    /**
     * A specialLocations object that defines locations of special significance to SARIF consumers.
     */
    use SpecialSignificanceLocations;

    /**
     * Key/value pairs that provide additional information about the run.
     */
    use Properties;

    /**
     * @param Tool $tool
     */
    public function __construct(Tool $tool)
    {
        $this->tool = $tool;

        $this->required = ['tool'];
        $this->optional = [
            'invocations',
            'conversion',
            'language',
            'versionControlProvenance',
            'originalUriBaseIds',
            'artifacts',
            'logicalLocations',
            'graphs',
            'results',
            'automationDetails',
            'runAggregates',
            'baselineGuid',
            'redactionTokens',
            'defaultEncoding',
            'defaultSourceLanguage',
            'newlineSequences',
            'columnKind',
            'externalPropertyFileReferences',
            'threadFlowLocations',
            'taxonomies',
            'addresses',
            'translations',
            'policies',
            'webRequests',
            'webResponses',
            'specialLocations',
            'properties',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $properties = parent::jsonSerialize();
        if (!isset($properties['results'])) {
            // special case for results array that shall be empty on report.
            // @see https://rawgit.com/sarif-standard/sarif-spec/master/Static%20Analysis%20Results%20Interchange%20Format%20(SARIF).html#run-results
            $properties['results'] = [];
        }
        return $properties;
    }
}
