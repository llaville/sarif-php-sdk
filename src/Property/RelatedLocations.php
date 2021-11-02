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
trait RelatedLocations
{
    /**
     * @var Location[]
     */
    protected $relatedLocations;

    /**
     * @param Location[] $relatedLocations
     */
    public function addRelatedLocations(array $relatedLocations): void
    {
        foreach ($relatedLocations as $relatedLocation) {
            if ($relatedLocation instanceof Location) {
                $this->relatedLocations[] = $relatedLocation;
            }
        }
    }
}
