<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\FinalState;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\StepOverEdgeCount;

/**
 * Represents the traversal of a single edge during a graph traversal.
 *
 * @author Laurent Laville
 */
final class EdgeTraversal extends JsonSerializable
{
    /**
     * Identifies the edge being traversed.
     * @var string
     */
    protected $edgeId;

    /**
     * A message to display to the user as the edge is traversed.
     */
    use MessageString;

    /**
     * The values of relevant expressions after the edge has been traversed.
     */
    use FinalState;

    /**
     * The number of edge traversals necessary to return from a nested graph.
     */
    use StepOverEdgeCount;

    /**
     * Key/value pairs that provide additional information about the edge traversal.
     */
    use Properties;

    /**
     * @param string $edgeId
     */
    public function __construct(string $edgeId)
    {
        $this->edgeId = $edgeId;

        $this->required = ['edgeId'];
        $this->optional = [
            'message',
            'finalState',
            'stepOverEdgeCount',
            'properties',
        ];
    }
}
