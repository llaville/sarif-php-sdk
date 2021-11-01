<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\PhysicalLocation;

/**
 * @author Laurent Laville
 */
trait PhysicalArtifactLocation
{
    /**
     * @var PhysicalLocation
     */
    protected $physicalLocation;

    /**
     * @param PhysicalLocation $physicalLocation
     */
    public function setPhysicalLocation(PhysicalLocation $physicalLocation): void
    {
        $this->physicalLocation = $physicalLocation;
    }
}
