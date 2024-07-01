<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * A location within a programming artifact.
 *
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Location extends JsonSerializable
{
    /**
     * Value that distinguishes this location from all other locations within a single result object.
     */
    use Property\IdLocation;

    /**
     * Identifies the artifact and region.
     */
    use Property\PhysicalArtifactLocation;

    /**
     * The logical locations associated with the result.
     */
    use Property\LogicalLocations;

    /**
     * A message relevant to the location.
     */
    use Property\MessageString;

    /**
     * A set of regions relevant to the location.
     */
    use Property\Annotations;

    /**
     * An array of objects that describe relationships between this location and others.
     */
    use Property\LocationRelationships;

    /**
     * Key/value pairs that provide additional information about the location.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'id',
            'physicalLocation',
            'logicalLocations',
            'message',
            'annotations',
            'relationships',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
