<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * A result produced by an analysis tool.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317638
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Result extends JsonSerializable
{
    /**
     * The stable, unique identifier of the rule, if any, to which this result is relevant.
     */
    use Property\RuleId;

    /**
     * The index within the tool component rules array of the rule object associated with this result.
     */
    use Property\RuleIndex;

    /**
     * A reference used to locate the rule descriptor relevant to this result.
     */
    use Property\Rule;

    /**
     * A value that categorizes results by evaluation state.
     */
    use Property\Kind;

    /**
     * A value specifying the severity level of the result.
     */
    use Property\Level;

    /**
     * A message that describes the result.
     * The first sentence of the message only will be displayed when visible space is limited.
     */
    use Property\MessageString;

    /**
     * Identifies the artifact that the analysis tool was instructed to scan.
     * This need not be the same as the artifact where the result actually occurred.
     */
    use Property\AnalysisTarget;

    /**
     * The set of locations where the result was detected.
     * Specify only one location unless the problem indicated by the result can only be corrected
     * by making a change at every specified location.
     */
    use Property\Locations;

    /**
     * A stable, unique identifier for the result in the form of a GUID.
     */
    use Property\Guid;

    /**
     * A stable, unique identifier for the equivalence class of logically identical results to which this result belongs,
     * in the form of a GUID.
     */
    use Property\CorrelationGuid;

    /**
     * A positive integer specifying the number of times this logically unique result was observed in this run.
     */
    use Property\OccurrenceCount;

    /**
     * A set of strings that contribute to the stable, unique identity of the result.
     */
    use Property\PartialFingerprints;

    /**
     * A set of strings each of which individually defines a stable, unique identity for the result.
     */
    use Property\Fingerprints;

    /**
     * An array of 'stack' objects relevant to the result.
     */
    use Property\Stacks;

    /**
     * An array of 'codeFlow' objects relevant to the result.
     */
    use Property\CodeFlows;

    /**
     * An array of zero or more unique graph objects associated with the result.
     */
    use Property\Graphs;

    /**
     * An array of one or more unique 'graphTraversal' objects.
     */
    use Property\GraphTraversals;

    /**
     * A set of locations relevant to this result.
     */
    use Property\RelatedLocations;

    /**
     * A set of suppressions relevant to this result.
     */
    use Property\Suppressions;

    /**
     * The state of a result relative to a baseline of a previous run.
     */
    use Property\BaselineState;

    /**
     * A number representing the priority or importance of the result.
     */
    use Property\Rank;

    /**
     * A set of artifacts relevant to the result.
     */
    use Property\Attachments;

    /**
     * An absolute URI at which the result can be viewed.
     */
    use Property\HostedViewerUri;

    /**
     * The URIs of the work items associated with this result.
     */
    use Property\WorkItemUris;

    /**
     * Information about how and when the result was detected.
     */
    use Property\Provenance;

    /**
     * An array of 'fix' objects, each of which represents a proposed fix to the problem indicated by the result.
     */
    use Property\Fixes;

    /**
     * An array of references to taxonomy reporting descriptors that are applicable to the result.
     */
    use Property\TaxaReferences;

    /**
     * A web request associated with this result.
     */
    use Property\WebRequestDetails;

    /**
     * A web response associated with this result.
     */
    use Property\WebResponseDetails;

    /**
     * Key/value pairs that provide additional information about the result.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['message'];
        $optional = [
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
        parent::__construct($required, $optional);
    }
}
