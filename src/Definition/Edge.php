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
 * Represents a directed edge in a graph.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317777
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Edge extends JsonSerializable
{
    /**
     * A string that uniquely identifies the edge within its graph.
     */
    use Property\Id;

    /**
     * A short description of the edge.
     */
    use Property\Label;

    /**
     * Identifies the source node (the node at which the edge starts).
     */
    use Property\SourceNodeId;

    /**
     * Identifies the target node (the node at which the edge ends).
     */
    use Property\TargetNodeId;

    /**
     * Key/value pairs that provide additional information about the edge
     */
    use Property\Properties;

    /**
     * @param string $id
     * @param string $sourceNodeId
     * @param string $targetNodeId
     */
    public function __construct(string $id, string $sourceNodeId, string $targetNodeId)
    {
        $this->id = $id;
        $this->sourceNodeId = $sourceNodeId;
        $this->targetNodeId = $targetNodeId;

        $required = [
            'id',
            'sourceNodeId',
            'targetNodeId',
        ];
        $optional = [
            'label',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
