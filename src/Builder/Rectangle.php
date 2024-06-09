<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Rectangle extends Declaration
{
    protected float $top;
    protected float $left;
    protected float $bottom;
    protected float $right;

    public function top(float $top): self
    {
        $this->top = $top;
        return $this;
    }

    public function left(float $left): self
    {
        $this->left = $left;
        return $this;
    }

    public function bottom(float $bottom): self
    {
        $this->bottom = $bottom;
        return $this;
    }

    public function right(float $right): self
    {
        $this->right = $right;
        return $this;
    }

    /**
     * Builds a valued instance of Rectangle definition.
     */
    public function build(): Definition\Rectangle
    {
        $rectangle = new Definition\Rectangle();
        $this->populate($rectangle);
        return $rectangle;
    }
}
