<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\AnalysisTarget;
use Bartlett\Sarif\Property\Attachments;
use Bartlett\Sarif\Property\BaselineState;
use Bartlett\Sarif\Property\CodeFlows;
use Bartlett\Sarif\Property\CorrelationGuid;
use Bartlett\Sarif\Property\Fingerprints;
use Bartlett\Sarif\Property\Fixes;
use Bartlett\Sarif\Property\Graphs;
use Bartlett\Sarif\Property\GraphTraversals;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\HostedViewerUri;
use Bartlett\Sarif\Property\Kind;
use Bartlett\Sarif\Property\Level;
use Bartlett\Sarif\Property\Locations;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\OccurrenceCount;
use Bartlett\Sarif\Property\PartialFingerprints;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Provenance;
use Bartlett\Sarif\Property\Rank;
use Bartlett\Sarif\Property\RelatedLocations;
use Bartlett\Sarif\Property\Rule;
use Bartlett\Sarif\Property\RuleId;
use Bartlett\Sarif\Property\RuleIndex;
use Bartlett\Sarif\Property\Stacks;
use Bartlett\Sarif\Property\Suppressions;
use Bartlett\Sarif\Property\Taxa;
use Bartlett\Sarif\Property\TaxaReferences;
use Bartlett\Sarif\Property\WebRequestDetails;
use Bartlett\Sarif\Property\WebResponseDetails;
use Bartlett\Sarif\Property\WorkItemUris;

/**
 * A result produced by an analysis tool.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317638
 * @author Laurent Laville
 */
final class Result extends JsonSerializable
{
    /**
     * The stable, unique identifier of the rule, if any, to which this result is relevant.
     */
    use RuleId;

    /**
     * The index within the tool component rules array of the rule object associated with this result.
     */
    use RuleIndex;

    /**
     * A reference used to locate the rule descriptor relevant to this result.
     */
    use Rule;

    /**
     * A value that categorizes results by evaluation state.
     */
    use Kind;

    /**
     * A value specifying the severity level of the result.
     */
    use Level;

    /**
     * A message that describes the result.
     * The first sentence of the message only will be displayed when visible space is limited.
     */
    use MessageString;

    /**
     * Identifies the artifact that the analysis tool was instructed to scan.
     * This need not be the same as the artifact where the result actually occurred.
     */
    use AnalysisTarget;

    /**
     * The set of locations where the result was detected.
     * Specify only one location unless the problem indicated by the result can only be corrected
     * by making a change at every specified location.
     */
    use Locations;

    /**
     * A stable, unique identifier for the result in the form of a GUID.
     */
    use Guid;

    /**
     * A stable, unique identifier for the equivalence class of logically identical results to which this result belongs,
     * in the form of a GUID.
     */
    use CorrelationGuid;

    /**
     * A positive integer specifying the number of times this logically unique result was observed in this run.
     */
    use OccurrenceCount;

    /**
     * A set of strings that contribute to the stable, unique identity of the result.
     */
    use PartialFingerprints;

    /**
     * A set of strings each of which individually defines a stable, unique identity for the result.
     */
    use Fingerprints;

    /**
     * An array of 'stack' objects relevant to the result.
     */
    use Stacks;

    /**
     * An array of 'codeFlow' objects relevant to the result.
     */
    use CodeFlows;

    /**
     * An array of zero or more unique graph objects associated with the result.
     */
    use Graphs;

    /**
     * An array of one or more unique 'graphTraversal' objects.
     */
    use GraphTraversals;

    /**
     * A set of locations relevant to this result.
     */
    use RelatedLocations;

    /**
     * A set of suppressions relevant to this result.
     */
    use Suppressions;

    /**
     * The state of a result relative to a baseline of a previous run.
     */
    use BaselineState;

    /**
     * A number representing the priority or importance of the result.
     */
    use Rank;

    /**
     * A set of artifacts relevant to the result.
     */
    use Attachments;

    /**
     * An absolute URI at which the result can be viewed.
     */
    use HostedViewerUri;

    /**
     * The URIs of the work items associated with this result.
     */
    use WorkItemUris;

    /**
     * Information about how and when the result was detected.
     */
    use Provenance;

    /**
     * An array of 'fix' objects, each of which represents a proposed fix to the problem indicated by the result.
     */
    use Fixes;

    /**
     * An array of references to taxonomy reporting descriptors that are applicable to the result.
     */
    use TaxaReferences;

    /**
     * A web request associated with this result.
     */
    use WebRequestDetails;

    /**
     * A web response associated with this result.
     */
    use WebResponseDetails;

    /**
     * Key/value pairs that provide additional information about the result.
     */
    use Properties;

    /**
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;

        $this->required = ['message'];
        $this->optional = [
            'ruleId',
            'ruleIndex',
            'rule',
            'kind',
            'level',
            'analysisTarget',
            'locations',
            'guid',
            'correlationGuid',
            'occurrenceCount',
            'partialFingerprints',
            'fingerprints',
            'stacks',
            'codeFlows',
            'graphs',
            'graphTraversals',
            'relatedLocations',
            'suppressions',
            'baselineState',
            'rank',
            'attachments',
            'hostedViewerUri',
            'workItemUris',
            'provenance',
            'fixes',
            'taxa',
            'webRequest',
            'webResponse',
            'properties',
        ];
    }
}
