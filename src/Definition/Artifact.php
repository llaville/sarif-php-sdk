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
 * A single artifact. In some cases, this artifact might be nested within another artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317611
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Artifact extends JsonSerializable
{
    /**
     * A short description of the artifact.
     */
    use Property\Description;

    /**
     * The location of the artifact.
     */
    use Property\LocationArtifact;

    /**
     * Identifies the index of the immediate parent of the artifact, if this artifact is nested.
     */
    use Property\ParentIndex;

    /**
     * The offset in bytes of the artifact within its containing artifact.
     */
    use Property\Offset;

    /**
     * The length of the artifact in bytes.
     */
    use Property\Length;

    /**
     * The role or roles played by the artifact in the analysis.
     */
    use Property\Roles;

    /**
     * The MIME type (RFC 2045) of the artifact.
     */
    use Property\MimeType;

    /**
     * The contents of the artifact.
     */
    use Property\ContentsArtifact;

    /**
     * Specifies the encoding for an artifact object that refers to a text file.
     */
    use Property\Encoding;

    /**
     * Specifies the source language for any artifact object that refers to a text file that contains source code.
     */
    use Property\SourceLanguage;

    /**
     * A dictionary, each of whose keys are the name of a hash function
     * and each of whose values are the hashed value of the artifact produced by the specified hash function.
     */
    use Property\Hashes;

    /**
     * Key/value pairs that provide additional information about the artifact.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = [];
        $optional = [
            'description',
            'location',
            'parentIndex',
            'offset',
            'length',
            'roles',
            'mimeType',
            'contents',
            'encoding',
            'sourceLanguage',
            'hashes',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
