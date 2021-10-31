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
 */
trait LocationArtifact
{
    /**
     * @var ArtifactLocation
     */
    protected $location;

    /**
     * @param ArtifactLocation $location
     */
    public function setLocation(ArtifactLocation $location): void
    {
        $this->location = $location;
    }
}
