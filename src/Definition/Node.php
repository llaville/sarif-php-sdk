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
 * Represents a node in a graph.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317771
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Node extends JsonSerializable
{
    /**
     * A string that uniquely identifies the node within its graph.
     */
    use Property\Id;

    /**
     * A short description of the node.
     */
    use Property\Label;

    /**
     * A code location associated with the node.
     */
    use Property\CodeLocation;

    /**
     * Array of child nodes.
     */
    use Property\Children;

    /**
     * Key/value pairs that provide additional information about the node.
     */
    use Property\Properties;

    public function __construct(string $id)
    {
        $this->id = $id;

        $required = ['id'];
        $optional = [
            'label',
            'location',
            'children',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
