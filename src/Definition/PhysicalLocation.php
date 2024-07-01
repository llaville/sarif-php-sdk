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
 * A physical location relevant to a result.
 * Specifies a reference to a programming artifact together with a range of bytes or characters within that artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317678
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class PhysicalLocation extends JsonSerializable
{
    /**
     * The address of the location.
     */
    use Property\AddressLocation;

    /**
     * The location of the artifact.
     */
    use Property\LocationArtifact;

    /**
     * Specifies a portion of the artifact.
     */
    use Property\RegionArtifact;

    /**
     * Specifies a portion of the artifact that encloses the region.
     * Allows a viewer to display additional context around the region.
     */
    use Property\ContextRegion;

    /**
     * Key/value pairs that provide additional information about the physical location.
     */
    use Property\Properties;

    /**
     * @param ArtifactLocation|null $artifactLocation
     * @param Address|null $address
     */
    public function __construct(?ArtifactLocation $artifactLocation = null, ?Address $address = null)
    {
        if ($artifactLocation instanceof ArtifactLocation) {
            $this->artifactLocation = $artifactLocation;
        }
        if ($address instanceof Address) {
            $this->address = $address;
        }

        $required = [];
        $optional = [
            'address',
            'artifactLocation',
            'region',
            'contextRegion',
            'properties' ,
        ];
        parent::__construct($required, $optional);
    }
}
