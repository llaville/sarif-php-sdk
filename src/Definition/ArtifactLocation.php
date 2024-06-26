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
 * Specifies the location of an artifact.
 *
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ArtifactLocation extends JsonSerializable
{
    /**
     * A string containing a valid relative or absolute URI.
     */
    use Property\Uri;

    /**
     * A string which indirectly specifies the absolute URI
     * with respect to which a relative URI in the "uri" property is interpreted.
     */
    use Property\UriBaseId;

    /**
     * The index within the run artifacts array of the artifact object associated with the artifact location.
     */
    use Property\Index;

    /**
     * A short description of the artifact location.
     */
    use Property\Description;

    /**
     * Key/value pairs that provide additional information about the artifact location.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'uri',
            'uriBaseId',
            'index',
            'description',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
