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
 * A network of nodes and directed edges that describes some aspect of the structure of the code (for example, a call graph).
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317766
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Graph extends JsonSerializable
{
    /**
     * A description of the graph.
     */
    use Property\Description;

    /**
     * An array of node objects representing the nodes of the graph.
     */
    use Property\Nodes;

    /**
     * An array of edge objects representing the edges of the graph.
     */
    use Property\Edges;

    /**
     * Key/value pairs that provide additional information about the graph.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'description',
            'nodes',
            'edges',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
