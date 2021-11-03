<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ThreadFlowLocation;

/**
 * @author Laurent Laville
 */
trait ThreadFlowLocations
{
    /**
     * @var ThreadFlowLocation[]
     */
    protected $locations;

    /**
     * @param ThreadFlowLocation[] $locations
     */
    public function addLocations(array $locations): void
    {
        foreach ($locations as $location) {
            if ($location instanceof ThreadFlowLocation) {
                $this->locations[] = $location;
            }
        }
    }
}
