<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ResultProvenance extends Declaration
{
    /**
     * @var Definition\PhysicalLocation[] $conversionSources
     */
    protected array $conversionSources;

    public function addConversionSource(PhysicalLocation $conversionSource): self
    {
        $this->conversionSources[] = $conversionSource->build();
        return $this;
    }

    /**
     * Builds a valued instance of ResultProvenance definition.
     */
    public function build(): Definition\ResultProvenance
    {
        $resultProvenance = new Definition\ResultProvenance();
        $this->populate($resultProvenance);
        return $resultProvenance;
    }
}
