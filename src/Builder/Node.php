<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

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
