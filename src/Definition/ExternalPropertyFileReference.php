<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\ItemCount;
use Bartlett\Sarif\Property\LocationArtifact;
use Bartlett\Sarif\Property\Properties;

use DomainException;

/**
 * An externalPropertyFileReference object contains information that enables a SARIF consumer
 * to locate the external property files that contain the values of all externalized properties associated with theRun.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317517
 * @author Laurent Laville
 */
final class ExternalPropertyFileReference extends JsonSerializable
{
    /**
     * The location of the external property file.
     */
    use LocationArtifact;

    /**
     * A stable, unique identifier for the external property file in the form of a GUID.
     */
    use Guid;

    /**
     * A non-negative integer specifying the number of items contained in the external property file.
     */
    use ItemCount;

    /**
     * Key/value pairs that provide additional information about the external property file.
     */
    use Properties;

    /**
     * @param ArtifactLocation|null $location
     * @param string $guid
     */
    public function __construct(ArtifactLocation $location = null, string $guid = '')
    {
        if (empty($location) && empty($guid)) {
            throw new DomainException('Either "location" or "guid" are required. Nothing provided.');
        }

        $this->location = $location;
        $this->setGuid($guid);

        $this->required = [];
        $this->optional = [
            'location',
            'guid',
            'itemCount',
            'properties',
        ];
    }
}
