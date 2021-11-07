<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\Label;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\SourceNodeId;
use Bartlett\Sarif\Property\TargetNodeId;

/**
 * Represents a directed edge in a graph.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317777
 * @author Laurent Laville
 */
final class Edge extends JsonSerializable
{
    /**
     * A string that uniquely identifies the edge within its graph.
     */
    use Id;

    /**
     * A short description of the edge.
     */
    use Label;

    /**
     * Identifies the source node (the node at which the edge starts).
     */
    use SourceNodeId;

    /**
     * Identifies the target node (the node at which the edge ends).
     */
    use TargetNodeId;

    /**
     * Key/value pairs that provide additional information about the edge
     */
    use Properties;

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

        $this->required = [
            'id',
            'sourceNodeId',
            'targetNodeId',
        ];
        $this->optional = [
            'label',
            'properties',
        ];
    }
}
