<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class Node extends Declaration
{
    protected string $id;
    /**
     * @var Definition\Node[] $children
     */
    protected array $children;

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function addChildren(Node $node): self
    {
        $this->children[] = $node->build();
        return $this;
    }

    /**
     * Builds a valued instance of Node definition.
     */
    public function build(): Definition\Node
    {
        $node = new Definition\Node($this->id);
        $this->populate($node);
        return $node;
    }
}
