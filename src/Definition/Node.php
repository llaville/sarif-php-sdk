<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Children;
use Bartlett\Sarif\Property\CodeLocation;
use Bartlett\Sarif\Property\Id;
use Bartlett\Sarif\Property\Label;
use Bartlett\Sarif\Property\Properties;

/**
 * Represents a node in a graph.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317771
 * @author Laurent Laville
 */
final class Node extends JsonSerializable
{
    /**
     * A string that uniquely identifies the node within its graph.
     */
    use Id;

    /**
     * A short description of the node.
     */
    use Label;

    /**
     * A code location associated with the node.
     */
    use CodeLocation;

    /**
     * Array of child nodes.
     */
    use Children;

    /**
     * Key/value pairs that provide additional information about the node.
     */
    use Properties;

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;

        $this->required = ['id'];
        $this->optional = [
            'label',
            'location',
            'children',
            'properties',
        ];
    }
}
