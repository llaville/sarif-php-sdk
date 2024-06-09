<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class DescriptorReference extends Declaration
{
    protected int $index;
    protected string $id;
    protected string $guid;
    protected Definition\ToolComponentReference $toolComponent;

    public function index(int $index): self
    {
        $this->index = $index;
        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function toolComponent(ToolComponent $toolComponent): self
    {
        $this->toolComponent = $toolComponent->build();
        return $this;
    }

    /**
     * Builds a valued instance of ReportingDescriptorReference definition.
     */
    public function build(): Definition\ReportingDescriptorReference
    {
        $descriptorReference = new Definition\ReportingDescriptorReference();
        $this->populate($descriptorReference);
        return $descriptorReference;
    }
}
