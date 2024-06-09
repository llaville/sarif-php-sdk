<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Location extends Declaration
{
    protected int $id;
    protected Definition\PhysicalLocation $physicalLocation;
    /**
     * @var Definition\LocationRelationship[] $relationships
     */
    protected array $relationships;
    /**
     * @var Definition\LogicalLocation[] $logicalLocations
     */
    protected array $logicalLocations;

    public function id(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function physicalLocation(PhysicalLocation $location): self
    {
        $this->physicalLocation = $location->build();
        return $this;
    }

    public function addLogicalLocation(LogicalLocation $location): self
    {
        $this->logicalLocations[] = $location->build();
        return $this;
    }

    public function addRelationship(LocationRelationship $relationship): self
    {
        $this->relationships[] = $relationship->build();
        return $this;
    }

    /**
     * Builds a valued instance of Location definition.
     */
    public function build(): Definition\Location
    {
        $location = new Definition\Location();
        $this->populate($location);
        return $location;
    }
}
