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
 * Represents the traversal of a single edge during a graph traversal.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317792
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class EdgeTraversal extends JsonSerializable
{
    /**
     * Identifies the edge being traversed.
     */
    use Property\EdgeId;

    /**
     * A message to display to the user as the edge is traversed.
     */
    use Property\MessageString;

    /**
     * The values of relevant expressions after the edge has been traversed.
     */
    use Property\FinalState;

    /**
     * The number of edge traversals necessary to return from a nested graph.
     */
    use Property\StepOverEdgeCount;

    /**
     * Key/value pairs that provide additional information about the edge traversal.
     */
    use Property\Properties;

    public function __construct(string $edgeId)
    {
        $this->edgeId = $edgeId;

        $required = ['edgeId'];
        $optional = [
            'message',
            'finalState',
            'stepOverEdgeCount',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
