<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class TranslationMetadata extends Declaration
{
    protected string $name;
    protected string $fullName;
    protected Definition\MultiformatMessageString $shortDescription;
    protected Definition\MultiformatMessageString $fullDescription;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function fullName(string $name): self
    {
        $this->fullName = $name;
        return $this;
    }

    public function shortDescription(string $text): self
    {
        $this->shortDescription = new Definition\MultiformatMessageString($text);
        return $this;
    }

    public function fullDescription(string $text): self
    {
        $this->fullDescription = new Definition\MultiformatMessageString($text);
        return $this;
    }

    /**
     * Builds a valued instance of TranslationMetadata definition.
     */
    public function build(): Definition\TranslationMetadata
    {
        $meta = new Definition\TranslationMetadata($this->name);
        $this->populate($meta);
        return $meta;
    }
}
