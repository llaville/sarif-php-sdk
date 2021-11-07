<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\CallStack;
use Bartlett\Sarif\Property\CodeLocation;
use Bartlett\Sarif\Property\ExecutionOrder;
use Bartlett\Sarif\Property\ExecutionTimeUtc;
use Bartlett\Sarif\Property\Importance;
use Bartlett\Sarif\Property\Index;
use Bartlett\Sarif\Property\Kinds;
use Bartlett\Sarif\Property\Module;
use Bartlett\Sarif\Property\NestingLevel;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\State;
use Bartlett\Sarif\Property\TaxaReferences;
use Bartlett\Sarif\Property\WebRequestDetails;
use Bartlett\Sarif\Property\WebResponseDetails;

/**
 * A location visited by an analysis tool while simulating or monitoring the execution of a program.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317751
 * @author Laurent Laville
 */
final class ThreadFlowLocation extends JsonSerializable
{
    /**
     * The index within the run threadFlowLocations array.
     */
    use Index;

    /**
     * The code location.
     */
    use CodeLocation;

    /**
     * The call stack leading to this location.
     */
    use CallStack;

    /**
     * A set of distinct strings that categorize the thread flow location.
     * Well-known kinds include
     * 'acquire', 'release', 'enter', 'exit', 'call', 'return', 'branch', 'implicit', 'false', 'true',
     * 'caution', 'danger', 'unknown', 'unreachable', 'taint', 'function', 'handler', 'lock', 'memory', 'resource',
     * 'scope' and 'value'.
     */
    use Kinds;

    /**
     * An array of references to rule or taxonomy reporting descriptors that are applicable to the thread flow location.
     */
    use TaxaReferences;

    /**
     * The name of the module that contains the code that is executing.
     */
    use Module;

    /**
     * A dictionary, each of whose keys specify a variable or expression,
     * the associated value of which represents the variable or expression value.
     * For an annotation of kind 'continuation', for example, this dictionary might hold the current assumed values
     * of a set of global variables.
     */
    use State;

    /**
     * An integer representing a containment hierarchy within the thread flow.
     */
    use NestingLevel;

    /**
     * An integer representing the temporal order in which execution reached this location.
     */
    use ExecutionOrder;

    /**
     * The Coordinated Universal Time (UTC) date and time at which this location was executed.
     */
    use ExecutionTimeUtc;

    /**
     * Specifies the importance of this location in understanding the code flow in which it occurs.
     * The order from most to least important is "essential", "important", "unimportant". Default: "important".
     */
    use Importance;

    /**
     * A web request associated with this thread flow location.
     */
    use WebRequestDetails;

    /**
     * A web response associated with this thread flow location.
     */
    use WebResponseDetails;

    /**
     * Key/value pairs that provide additional information about the thread flow location.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
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
    }
}
