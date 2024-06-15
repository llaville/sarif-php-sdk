<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
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
