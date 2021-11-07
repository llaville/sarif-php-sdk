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
use Bartlett\Sarif\Property\Edges;
use Bartlett\Sarif\Property\Nodes;
use Bartlett\Sarif\Property\Properties;

/**
 * A network of nodes and directed edges that describes some aspect of the structure of the code (for example, a call graph).
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317766
 * @author Laurent Laville
 */
final class Graph extends JsonSerializable
{
    /**
     * A description of the graph.
     */
    use Description;

    /**
     * An array of node objects representing the nodes of the graph.
     */
    use Nodes;

    /**
     * An array of edge objects representing the edges of the graph.
     */
    use Edges;

    /**
     * Key/value pairs that provide additional information about the graph.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'description',
            'nodes',
            'edges',
            'properties',
        ];
    }
}
