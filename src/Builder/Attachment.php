<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Attachment extends Declaration
{
    protected Definition\ArtifactLocation $artifactLocation;
    protected Definition\Message $description;
    /**
     * @var Definition\Rectangle[] $rectangles
     */
    protected array $rectangles;

    public function artifactLocation(ArtifactLocation $artifactLocation): self
    {
        $this->artifactLocation = $artifactLocation->build();
        return $this;
    }

    public function description(string $text): self
    {
        $this->description = new Definition\Message($text);
        return $this;
    }

    public function addRectangle(Rectangle $rectangle): self
    {
        $this->rectangles[] = $rectangle->build();
        return $this;
    }

    /**
     * Builds a valued instance of Attachment definition.
     */
    public function build(): Definition\Attachment
    {
        $attachment = new Definition\Attachment();
        $this->populate($attachment);
        return $attachment;
    }
}
