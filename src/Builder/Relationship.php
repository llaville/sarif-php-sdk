<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

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
        $relationship = new Definition\ReportingDescriptorRelationship($this->target);
        $this->populate($relationship);
        return $relationship;
    }
}
