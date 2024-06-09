<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Suppression extends Declaration
{
    protected string $kind;
    protected string $guid;
    protected string $status;
    protected string $justification;

    public function kind(string $kind): self
    {
        $this->kind = $kind;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function status(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function justification(string $justification): self
    {
        $this->justification = $justification;
        return $this;
    }

    /**
     * Builds a valued instance of Suppression definition.
     */
    public function build(): Definition\Suppression
    {
        $suppression = new Definition\Suppression($this->kind);
        $this->populate($suppression);
        return $suppression;
    }
}
