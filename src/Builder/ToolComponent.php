<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ToolComponent extends Declaration
{
    protected string $name;
    protected string $guid;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    /**
     * Builds a valued instance of ToolComponentReference definition.
     */
    public function build(): Definition\ToolComponentReference
    {
        $toolComponent = new Definition\ToolComponentReference();
        $this->populate($toolComponent);
        return $toolComponent;
    }
}
