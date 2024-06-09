<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Replacement extends Declaration
{
    protected Definition\Region $deletedRegion;
    protected Definition\ArtifactContent $insertedContent;

    public function deletedRegion(Region $region): self
    {
        $this->deletedRegion = $region->build();
        return $this;
    }

    public function insertedContent(ArtifactContent $artifactContent): self
    {
        $this->insertedContent = $artifactContent->build();
        return $this;
    }

    /**
     * Builds a valued instance of Replacement definition.
     */
    public function build(): Definition\Replacement
    {
        $replacement = new Definition\Replacement($this->deletedRegion);
        $this->populate($replacement);
        return $replacement;
    }
}
