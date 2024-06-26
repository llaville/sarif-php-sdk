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
final class Address extends Declaration
{
    protected int $absoluteAddress;
    protected ?string $name;
    protected int $offsetFromParent;
    protected int $parentIndex;
    protected int $relativeAddress;
    protected ?string $kind;

    public function absoluteAddress(int $absoluteAddress): self
    {
        $this->absoluteAddress = $absoluteAddress;
        return $this;
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function offsetFromParent(int $offsetFromParent): self
    {
        $this->offsetFromParent = $offsetFromParent;
        return $this;
    }

    public function parentIndex(int $index): self
    {
        $this->parentIndex = $index;
        return $this;
    }

    public function relativeAddress(int $relativeAddress): self
    {
        $this->relativeAddress = $relativeAddress;
        return $this;
    }

    public function kind(string $kind): self
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * Builds a valued instance of Address definition.
     */
    public function build(): Definition\Address
    {
        $address = new Definition\Address();
        $this->populate($address);
        return $address;
    }
}
