<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Binary;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Rendered;
use Bartlett\Sarif\Property\Text;

/**
 * Represents the contents of an artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317422
 * @author Laurent Laville
 */
final class ArtifactContent extends JsonSerializable
{
    /**
     * UTF-8-encoded content from a text artifact.
     */
    use Text;

    /**
     * MIME Base64-encoded content from a binary artifact, or from a text artifact in its original encoding.
     */
    use Binary;

    /**
     * An alternate rendered representation of the artifact (e.g., a decompiled representation of a binary region).
     */
    use Rendered;

    /**
     * Key/value pairs that provide additional information about the artifact content.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'text',
            'binary',
            'rendered',
            'properties',
        ];
    }
}
