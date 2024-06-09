<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ArtifactContent extends Declaration
{
    protected ?string $text;

    public function text(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Builds a valued instance of ArtifactContent definition.
     */
    public function build(): Definition\ArtifactContent
    {
        $artifactContent  = new Definition\ArtifactContent();
        $this->populate($artifactContent);
        return $artifactContent;
    }
}
