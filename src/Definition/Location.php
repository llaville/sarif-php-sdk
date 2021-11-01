<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Annotations;
use Bartlett\Sarif\Property\IdLocation;
use Bartlett\Sarif\Property\LocationRelationships;
use Bartlett\Sarif\Property\LogicalLocations;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\PhysicalArtifactLocation;
use Bartlett\Sarif\Property\Properties;

/**
 * A location within a programming artifact.
 *
 * @author Laurent Laville
 */
final class Location extends JsonSerializable
{
    /**
     * Value that distinguishes this location from all other locations within a single result object.
     */
    use IdLocation;

    /**
     * Identifies the artifact and region.
     */
    use PhysicalArtifactLocation;

    /**
     * The logical locations associated with the result.
     */
    use LogicalLocations;

    /**
     * A message relevant to the location.
     */
    use MessageString;

    /**
     * A set of regions relevant to the location.
     */
    use Annotations;

    /**
     * An array of objects that describe relationships between this location and others.
     */
    use LocationRelationships;

    /**
     * Key/value pairs that provide additional information about the location.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'id',
            'physicalLocation',
            'logicalLocations',
            'message',
            'annotations',
            'relationships',
            'properties',
        ];
    }
}
