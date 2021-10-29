<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\LogicalLocation;

/**
 * @author Laurent Laville
 */
trait LogicalLocations
{
    /**
     * @var LogicalLocation[]
     */
    protected $logicalLocations;

    /**
     * @param LogicalLocation[] $logicalLocations
     */
    public function addLogicalLocations(array $logicalLocations): void
    {
        foreach ($logicalLocations as $logicalLocation) {
            if ($logicalLocation instanceof LogicalLocation) {
                $this->logicalLocations[] = $logicalLocation;
            }
        }
    }
}
