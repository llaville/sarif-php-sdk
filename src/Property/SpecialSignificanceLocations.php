<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\SpecialLocations;

/**
 * @author Laurent Laville
 */
trait SpecialSignificanceLocations
{
    /**
     * @var SpecialLocations[]
     */
    protected $specialLocations;

    /**
     * @param SpecialLocations[] $specialLocations
     */
    public function addSpecialLocations(array $specialLocations): void
    {
        foreach ($specialLocations as $specialLocation) {
            if ($specialLocation instanceof SpecialLocations) {
                $this->specialLocations[] = $specialLocation;
            }
        }
    }
}
