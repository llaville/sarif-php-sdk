<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class LogicalLocation extends Declaration
{
    protected string $name;
    protected string $fullyQualifiedName;
    protected string $kind;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function fullyQualifiedName(string $fullyQualifiedName): self
    {
        $this->fullyQualifiedName = $fullyQualifiedName;
        return $this;
    }

    public function kind(string $kind): self
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * Builds a valued instance of LogicalLocation definition.
     */
    public function build(): Definition\LogicalLocation
    {
        $logicalLocation = new Definition\LogicalLocation();
        $this->populate($logicalLocation);
        return $logicalLocation;
    }
}
