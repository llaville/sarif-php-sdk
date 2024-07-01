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
final class Relationship extends Declaration
{
    protected Definition\ReportingDescriptorReference $target;
    /**
     * @var string[] $kinds
     */
    protected array $kinds;

    public function target(DescriptorReference $target): self
    {
        $this->target = $target->build();
        return $this;
    }

    public function addKind(string $kind): self
    {
        $this->kinds[] = $kind;
        return $this;
    }

    /**
     * Builds a valued instance of ReportingDescriptorRelationship definition.
     */
    public function build(): Definition\ReportingDescriptorRelationship
    {
        $relationship = new Definition\ReportingDescriptorRelationship();
        $this->populate($relationship);
        return $relationship;
    }
}
