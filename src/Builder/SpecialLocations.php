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
final class SpecialLocations extends Declaration
{
    protected Definition\ArtifactLocation $displayBase;

    public function displayBase(ArtifactLocation $displayBase): self
    {
        $this->displayBase = $displayBase->build();
        return $this;
    }

    /**
     * Builds a valued instance of SpecialLocations definition.
     */
    public function build(): Definition\SpecialLocations
    {
        $specialLocations = new Definition\SpecialLocations();
        $this->populate($specialLocations);
        return $specialLocations;
    }
}
