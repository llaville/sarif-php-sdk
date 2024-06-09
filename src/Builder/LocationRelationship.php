<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class LocationRelationship extends Declaration
{
    protected int $target;
    /**
     * @var string[] $kinds
     */
    protected array $kinds;

    public function target(int $target): self
    {
        $this->target = $target;
        return $this;
    }

    public function addKind(string $kind): self
    {
        $this->kinds[] = $kind;
        return $this;
    }

    /**
     * Builds a valued instance of LocationRelationship definition.
     */
    public function build(): Definition\LocationRelationship
    {
        $locationRelationship = new Definition\LocationRelationship($this->target);
        $this->populate($locationRelationship);
        return $locationRelationship;
    }
}
