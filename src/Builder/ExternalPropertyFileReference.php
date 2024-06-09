<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ExternalPropertyFileReference extends Declaration
{
    protected Definition\ArtifactLocation $location;
    protected string $guid;
    protected int $itemCount;

    public function location(ArtifactLocation $location): self
    {
        $this->location = $location->build();
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function itemCount(int $itemCount): self
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * Builds a valued instance of ExternalPropertyFileReference definition.
     */
    public function build(): Definition\ExternalPropertyFileReference
    {
        $externalPropertyFileReference = new Definition\ExternalPropertyFileReference();
        $this->populate($externalPropertyFileReference);
        return $externalPropertyFileReference;
    }
}
