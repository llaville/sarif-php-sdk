<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\AddressLocation;
use Bartlett\Sarif\Property\ContextRegion;
use Bartlett\Sarif\Property\LocationArtifact;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\RegionArtifact;

use LogicException;

/**
 * A physical location relevant to a result.
 * Specifies a reference to a programming artifact together with a range of bytes or characters within that artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317678
 * @author Laurent Laville
 */
final class PhysicalLocation extends JsonSerializable
{
    /**
     * The address of the location.
     */
    use AddressLocation;

    /**
     * The location of the artifact.
     */
    use LocationArtifact;

    /**
     * Specifies a portion of the artifact.
     */
    use RegionArtifact;

    /**
     * Specifies a portion of the artifact that encloses the region.
     * Allows a viewer to display additional context around the region.
     */
    use ContextRegion;

    /**
     * Key/value pairs that provide additional information about the physical location.
     */
    use Properties;

    /**
     * @param ArtifactLocation|null $artifactLocation
     * @param Address|null $address
     */
    public function __construct(ArtifactLocation $artifactLocation = null, Address $address = null)
    {
        $this->artifactLocation = $artifactLocation;
        $this->address = $address;

        if (empty($address) && empty($artifactLocation)) {
            throw new LogicException('Either "address" or "artifactLocation" are required. Nothing provided.');
        }

        $this->required = [];
        $this->optional = [
            'address',
            'artifactLocation',
            'region',
            'contextRegion',
            'properties' ,
        ];
    }
}
