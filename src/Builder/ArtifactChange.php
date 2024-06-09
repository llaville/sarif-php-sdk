<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ArtifactChange extends Declaration
{
    protected \Bartlett\Sarif\Definition\ArtifactLocation $artifactLocation;
    /**
     * @var Definition\Replacement[] $replacements
     */
    protected array $replacements;

    public function artifactLocation(ArtifactLocation $location): self
    {
        $this->artifactLocation = $location->build();
        return $this;
    }
    public function addReplacement(Replacement $replacement): self
    {
        $this->replacements[] = $replacement->build();
        return $this;
    }

    /**
     * Builds a valued instance of ArtifactChange definition.
     */
    public function build(): Definition\ArtifactChange
    {
        $artifactChange = new Definition\ArtifactChange(
            $this->artifactLocation,
            $this->replacements ?? []
        );
        $this->populate($artifactChange);
        return $artifactChange;
    }
}
