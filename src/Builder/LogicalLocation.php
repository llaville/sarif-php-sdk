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
final class LogicalLocation extends Declaration
{
    protected string $name;
    protected string $fullyQualifiedName;
    protected string $kind;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function fullyQualifiedName(string $fullyQualifiedName): self
    {
        $this->fullyQualifiedName = $fullyQualifiedName;
        return $this;
    }

    public function kind(string $kind): self
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * Builds a valued instance of LogicalLocation definition.
     */
    public function build(): Definition\LogicalLocation
    {
        $logicalLocation = new Definition\LogicalLocation();
        $this->populate($logicalLocation);
        return $logicalLocation;
    }
}
