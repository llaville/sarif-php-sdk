<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Location;

/**
 * @author Laurent Laville
 */
trait Locations
{
    /**
     * @var Location[]
     */
    protected $locations;

    /**
     * @param Location[] $locations
     */
    public function addLocations(array $locations): void
    {
        foreach ($locations as $location) {
            if ($location instanceof Location) {
                $this->locations[] = $location;
            }
        }
    }
}
