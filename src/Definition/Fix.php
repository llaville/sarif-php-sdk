<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\ArtifactChanges;
use Bartlett\Sarif\Property\Description;
use Bartlett\Sarif\Property\Properties;

/**
 * A proposed fix for the problem represented by a result object.
 * A fix specifies a set of artifacts to modify.
 * For each artifact, it specifies a set of bytes to remove, and provides a set of new bytes to replace them.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317881
 * @author Laurent Laville
 */
final class Fix extends JsonSerializable
{
    /**
     * A message that describes the proposed fix, enabling viewers to present the proposed change to an end user.
     */
    use Description;

    /**
     * One or more artifact changes that comprise a fix for a result.
     */
    use ArtifactChanges;

    /**
     * Key/value pairs that provide additional information about the fix.
     */
    use Properties;

    /**
     * @param ArtifactChange[] $artifactChanges
     */
    public function __construct(array $artifactChanges)
    {
        $this->addArtifactChanges($artifactChanges);

        $this->required = ['artifactChanges'];
        $this->optional = [
            'description,',
            'properties',
        ];
    }
}
