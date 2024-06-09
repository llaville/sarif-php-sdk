<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class PhysicalLocation extends Declaration
{
    protected ?Definition\Address $address;
    protected ?Definition\ArtifactLocation $artifactLocation;
    protected ?Definition\Region $region;

    public function __construct()
    {
        $this->address = null;
        $this->artifactLocation = null;
        $this->region = null;
    }

    public function artifactLocation(ArtifactLocation $location): self
    {
        $this->artifactLocation = $location->build();
        return $this;
    }

    public function region(Region $region): self
    {
        $this->region = $region->build();
        return $this;
    }

    /**
     * Builds a valued instance of PhysicalLocation definition.
     */
    public function build(): Definition\PhysicalLocation
    {
        $location = new Definition\PhysicalLocation($this->artifactLocation, $this->address);
        $this->populate($location);
        return $location;
    }
}
