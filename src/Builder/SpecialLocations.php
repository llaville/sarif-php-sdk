<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class SpecialLocations extends Declaration
{
    protected Definition\ArtifactLocation $displayBase;

    public function displayBase(ArtifactLocation $displayBase): self
    {
        $this->displayBase = $displayBase->build();
        return $this;
    }

    /**
     * Builds a valued instance of SpecialLocations definition.
     */
    public function build(): Definition\SpecialLocations
    {
        $specialLocations = new Definition\SpecialLocations();
        $this->populate($specialLocations);
        return $specialLocations;
    }
}
