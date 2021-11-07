<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Description;
use Bartlett\Sarif\Property\EdgeTraversals;
use Bartlett\Sarif\Property\ImmutableState;
use Bartlett\Sarif\Property\InitialState;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\ResultGraphIndex;
use Bartlett\Sarif\Property\RunGraphIndex;

use DomainException;
use function is_numeric;

/**
 * Represents a path through a graph.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317783
 * @author Laurent Laville
 */
final class GraphTraversal extends JsonSerializable
{
    /**
     * The index within the run.graphs to be associated with the result.
     */
    use RunGraphIndex;

    /**
     * The index within the result.graphs to be associated with the result.
     */
    use ResultGraphIndex;

    /**
     * A description of this graph traversal.
     */
    use Description;

    /**
     * InitialState:
     * Values of relevant expressions at the start of the graph traversal that may change during graph traversal.
     * ImmutableState:
     * Values of relevant expressions at the start of the graph traversal that remain constant for the graph traversal.
     */
    use InitialState, ImmutableState {
        InitialState::addAdditionalProperties as addAdditionalPropertiesInitialState;
        ImmutableState::addAdditionalProperties insteadof InitialState;
    }

    /**
     * The sequences of edges traversed by this graph traversal.
     */
    use EdgeTraversals;

    /**
     * Key/value pairs that provide additional information about the graph traversal.
     */
    use Properties;

    /**
     * @param int|null $runGraphIndex
     * @param int|null $resultGraphIndex
     */
    public function __construct(?int $runGraphIndex = null, ?int $resultGraphIndex = null)
    {
        if (!is_numeric($runGraphIndex) && !is_numeric($resultGraphIndex)) {
            throw new DomainException('Either "runGraphIndex" or "resultGraphIndex" are required. Nothing provided.');
        }

        $this->runGraphIndex = $runGraphIndex;
        $this->resultGraphIndex = $resultGraphIndex;

        $this->required = [];
        $this->optional = [
            'runGraphIndex',
            'resultGraphIndex',
            'description',
            'initialState',
            'immutableState',
            'edgeTraversals',
            'properties',
        ];
    }
}
