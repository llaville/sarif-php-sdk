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
 * A change to a single artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317885
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class ArtifactChange extends JsonSerializable
{
    /**
     * The location of the artifact to change.
     */
    use Property\LocationArtifact;

    /**
     * An array of replacement objects,
     * each of which represents the replacement of a single region in a single artifact specified by 'artifactLocation'.
     */
    use Property\Replacements;

    /**
     * Key/value pairs that provide additional information about the change.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [
            'artifactLocation',
            'replacements',
        ];
        $optional = [
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
