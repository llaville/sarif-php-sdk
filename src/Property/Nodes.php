<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Node;

/**
 * @author Laurent Laville
 */
trait Nodes
{
    /**
     * @var Node[]
     */
    protected $nodes;

    /**
     * @param Node[] $nodes
     */
    public function addNodes(array $nodes): void
    {
        foreach ($nodes as $node) {
            if ($node instanceof Node) {
                $this->nodes[] = $node;
            }
        }
    }
}
