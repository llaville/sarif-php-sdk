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
final class LocationRelationship extends Declaration
{
    protected int $target;
    /**
     * @var string[] $kinds
     */
    protected array $kinds;

    public function target(int $target): self
    {
        $this->target = $target;
        return $this;
    }

    public function addKind(string $kind): self
    {
        $this->kinds[] = $kind;
        return $this;
    }

    /**
     * Builds a valued instance of LocationRelationship definition.
     */
    public function build(): Definition\LocationRelationship
    {
        $locationRelationship = new Definition\LocationRelationship();
        $this->populate($locationRelationship);
        return $locationRelationship;
    }
}
