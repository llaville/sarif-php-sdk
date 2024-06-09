<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Tool
{
    protected Definition\ToolComponent $driver;
    /**
     * @var Definition\ToolComponent[] $extensions
     */
    protected array $extensions;

    public function __construct()
    {
        $this->extensions = [];
    }

    public function driver(Driver $driver): self
    {
        $this->driver = $driver->build();
        return $this;
    }

    public function addExtension(Extension $extension): self
    {
        $this->extensions[] = $extension->build();
        return $this;
    }

    /**
     * Builds a valued instance of Tool definition.
     */
    public function build(): Definition\Tool
    {
        $tool = new Definition\Tool($this->driver);
        $tool->addExtensions($this->extensions);
        return $tool;
    }
}
