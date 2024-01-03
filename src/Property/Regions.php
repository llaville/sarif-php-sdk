<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Region;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait Regions
{
    /**
     * @var Region[]
     */
    protected array $regions;

    /**
     * @param Region[] $regions
     */
    public function addRegions(array $regions): void
    {
        foreach ($regions as $region) {
            if ($region instanceof Region) {
                $this->regions[] = $region;
            }
        }
    }
}
