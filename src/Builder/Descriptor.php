<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Descriptor extends Declaration
{
    protected int $index;
    protected string $id;

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

    /**
     * Builds a valued instance of ReportingDescriptorReference definition.
     */
    public function build(): Definition\ReportingDescriptorReference
    {
        $descriptor = new Definition\ReportingDescriptorReference();
        $this->populate($descriptor);
        return $descriptor;
    }
}
