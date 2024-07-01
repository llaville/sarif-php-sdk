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

use function is_int;

/**
 * Represents a path through a graph.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317783
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class GraphTraversal extends JsonSerializable
{
    /**
     * The index within the run.graphs to be associated with the result.
     */
    use Property\RunGraphIndex;

    /**
     * The index within the result.graphs to be associated with the result.
     */
    use Property\ResultGraphIndex;

    /**
     * A description of this graph traversal.
     */
    use Property\Description;

    /**
     * InitialState:
     * Values of relevant expressions at the start of the graph traversal that may change during graph traversal.
     * ImmutableState:
     * Values of relevant expressions at the start of the graph traversal that remain constant for the graph traversal.
     */
    use Property\InitialState, Property\ImmutableState {
        Property\InitialState::addAdditionalProperties as addAdditionalPropertiesInitialState;
        Property\ImmutableState::addAdditionalProperties insteadof Property\InitialState;
    }

    /**
     * The sequences of edges traversed by this graph traversal.
     */
    use Property\EdgeTraversals;

    /**
     * Key/value pairs that provide additional information about the graph traversal.
     */
    use Property\Properties;

    /**
     * @param int|null $runGraphIndex
     * @param int|null $resultGraphIndex
     */
    public function __construct(?int $runGraphIndex = null, ?int $resultGraphIndex = null)
    {
        if (is_int($runGraphIndex)) {
            $this->runGraphIndex = $runGraphIndex;
        }
        if (is_int($resultGraphIndex)) {
            $this->resultGraphIndex = $resultGraphIndex;
        }

        $required = [];
        $optional = [
            'runGraphIndex',
            'resultGraphIndex',
            'description',
            'initialState',
            'immutableState',
            'edgeTraversals',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
