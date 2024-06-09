<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Graph extends Declaration
{
    /**
     * @var Definition\Node[] $nodes
     */
    protected array $nodes;
    /**
     * @var Definition\Edge[] $edges
     */
    protected array $edges;

    public function addNode(Node $node): self
    {
        $this->nodes[] = $node->build();
        return $this;
    }

    public function addEdge(Edge $edge): self
    {
        $this->edges[] = $edge->build();
        return $this;
    }

    /**
     * Builds a valued instance of Graph definition.
     */
    public function build(): Definition\Graph
    {
        $graph = new Definition\Graph();
        $this->populate($graph);
        return $graph;
    }
}
