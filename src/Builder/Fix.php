<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Fix extends Declaration
{
    /**
     * @var Definition\ArtifactChange[] $artifactChanges
     */
    protected array $artifactChanges;

    public function __construct()
    {
        $this->artifactChanges = [];
    }

    public function addArtifactChange(ArtifactChange $artifactChange): self
    {
        $this->artifactChanges[] = $artifactChange->build();
        return $this;
    }

    /**
     * Builds a valued instance of Fix definition.
     */
    public function build(): Definition\Fix
    {
        $fix = new Definition\Fix($this->artifactChanges);
        $this->populate($fix);
        return $fix;
    }
}
