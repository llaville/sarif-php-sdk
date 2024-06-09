<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Extension extends Declaration
{
    protected string $name;
    protected string $version;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function version(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Builds a valued instance of ToolComponent definition.
     */
    public function build(): Definition\ToolComponent
    {
        $extension = new Definition\ToolComponent($this->name);
        $this->populate($extension);
        return $extension;
    }
}
