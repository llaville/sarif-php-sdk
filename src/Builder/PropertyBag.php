<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class PropertyBag
{
    /**
     * @var array<string, string>
     */
    protected array $tags;

    public function __construct()
    {
        $this->tags = [];
    }

    public function addProperty(string $key, string $value): self
    {
        $this->tags[$key] = $value;
        return $this;
    }

    /**
     * Builds a valued instance of PropertyBag definition.
     */
    public function build(): Definition\PropertyBag
    {
        return new Definition\PropertyBag($this->tags);
    }
}
