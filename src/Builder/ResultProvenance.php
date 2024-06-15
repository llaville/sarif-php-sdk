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
