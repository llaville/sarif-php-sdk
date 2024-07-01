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
 * A location visited by an analysis tool while simulating or monitoring the execution of a program.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317751
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ThreadFlowLocation extends JsonSerializable
{
    /**
     * The index within the run threadFlowLocations array.
     */
    use Property\Index;

    /**
     * The code location.
     */
    use Property\CodeLocation;

    /**
     * The call stack leading to this location.
     */
    use Property\CallStack;

    /**
     * A set of distinct strings that categorize the thread flow location.
     * Well-known kinds include
     * 'acquire', 'release', 'enter', 'exit', 'call', 'return', 'branch', 'implicit', 'false', 'true',
     * 'caution', 'danger', 'unknown', 'unreachable', 'taint', 'function', 'handler', 'lock', 'memory', 'resource',
     * 'scope' and 'value'.
     */
    use Property\Kinds;

    /**
     * An array of references to rule or taxonomy reporting descriptors that are applicable to the thread flow location.
     */
    use Property\TaxaReferences;

    /**
     * The name of the module that contains the code that is executing.
     */
    use Property\Module;

    /**
     * A dictionary, each of whose keys specify a variable or expression,
     * the associated value of which represents the variable or expression value.
     * For an annotation of kind 'continuation', for example, this dictionary might hold the current assumed values
     * of a set of global variables.
     */
    use Property\State;

    /**
     * An integer representing a containment hierarchy within the thread flow.
     */
    use Property\NestingLevel;

    /**
     * An integer representing the temporal order in which execution reached this location.
     */
    use Property\ExecutionOrder;

    /**
     * The Coordinated Universal Time (UTC) date and time at which this location was executed.
     */
    use Property\ExecutionTimeUtc;

    /**
     * Specifies the importance of this location in understanding the code flow in which it occurs.
     * The order from most to least important is "essential", "important", "unimportant". Default: "important".
     */
    use Property\Importance;

    /**
     * A web request associated with this thread flow location.
     */
    use Property\WebRequestDetails;

    /**
     * A web response associated with this thread flow location.
     */
    use Property\WebResponseDetails;

    /**
     * Key/value pairs that provide additional information about the thread flow location.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'index',
            'location',
            'stack',
            'kinds',
            'taxa',
            'module',
            'state',
            'nestingLevel',
            'executionOrder',
            'executionTimeUtc',
            'importance',
            'webRequest',
            'webResponse',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
