<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ArtifactLocation;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait LocationArtifact
{
    protected ArtifactLocation $location;

    /**
     * Alias for PhysicalLocation definition
     */
    protected ArtifactLocation $artifactLocation;

    public function setLocation(ArtifactLocation $location): void
    {
        $this->location = $location;
    }

    public function setArtifactLocation(ArtifactLocation $artifactLocation): void
    {
        $this->artifactLocation = $artifactLocation;
    }
}
