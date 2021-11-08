<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\LocationArtifact;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Replacements;

/**
 * A change to a single artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317885
 * @author Laurent Laville
 */
final class ArtifactChange extends JsonSerializable
{
    /**
     * The location of the artifact to change.
     */
    use LocationArtifact;

    /**
     * An array of replacement objects,
     * each of which represents the replacement of a single region in a single artifact specified by 'artifactLocation'.
     */
    use Replacements;

    /**
     * Key/value pairs that provide additional information about the change.
     */
    use Properties;

    /**
     * @param ArtifactLocation $artifactLocation
     * @param Replacement[] $replacements
     */
    public function __construct(ArtifactLocation $artifactLocation, array $replacements)
    {
        $this->artifactLocation = $artifactLocation;
        $this->addReplacements($replacements);

        $this->required = [
            'artifactLocation',
            'replacements',
        ];
        $this->optional = [
            'properties',
        ];
    }
}
