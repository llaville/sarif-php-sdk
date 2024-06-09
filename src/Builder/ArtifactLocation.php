<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ArtifactLocation extends Declaration
{
    protected ?Definition\Message $description;
    protected ?string $uri;
    protected ?string $uriBaseId;

    public function description(string $text): self
    {
        $this->description = new Definition\Message($text);
        return $this;
    }

    public function uri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    public function uriBaseId(string $id): self
    {
        $this->uriBaseId = $id;
        return $this;
    }

    /**
     * Builds a valued instance of ArtifactLocation definition.
     */
    public function build(): Definition\ArtifactLocation
    {
        $location = new Definition\ArtifactLocation();
        $this->populate($location);
        return $location;
    }
}
