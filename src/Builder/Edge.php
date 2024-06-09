<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Edge extends Declaration
{
    protected string $id;
    protected string $sourceNodeId;
    protected string $targetNodeId;

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function sourceNodeId(string $id): self
    {
        $this->sourceNodeId = $id;
        return $this;
    }

    public function targetNodeId(string $id): self
    {
        $this->targetNodeId = $id;
        return $this;
    }

    /**
     * Builds a valued instance of Edge definition.
     */
    public function build(): Definition\Edge
    {
        $edge = new Definition\Edge($this->id, $this->sourceNodeId, $this->targetNodeId);
        $this->populate($edge);
        return $edge;
    }
}
