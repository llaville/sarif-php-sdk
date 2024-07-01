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

use function is_int;

/**
 * A region within an artifact where a result was detected.
 *
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Region extends JsonSerializable
{
    /**
     * The line number of the first character in the region.
     */
    use Property\StartLine;

    /**
     * The column number of the first character in the region.
     */
    use Property\StartColumn;

    /**
     * The line number of the last character in the region.
     */
    use Property\EndLine;

    /**
     * The column number of the character following the end of the region.
     */
    use Property\EndColumn;

    /**
     * The zero-based offset from the beginning of the artifact of the first character in the region.
     */
    use Property\CharOffset;

    /**
     * The length of the region in characters.
     */
    use Property\CharLength;

    /**
     * The zero-based offset from the beginning of the artifact of the first byte in the region.
     */
    use Property\ByteOffset;

    /**
     * The length of the region in bytes.
     */
    use Property\ByteLength;

    /**
     * The portion of the artifact contents within the specified region.
     */
    use Property\Snippet;

    /**
     * A message relevant to the region.
     */
    use Property\MessageString;

    /**
     * Specifies the source language, if any, of the portion of the artifact specified by the region object.
     */
    use Property\SourceLanguage;

    /**
     * Key/value pairs that provide additional information about the region.
     */
    use Property\Properties;

    /**
     * @param int|null $startLine
     * @param int|null $startColumn
     * @param int|null $endLine
     * @param int|null $endColumn
     */
    public function __construct(
        ?int $startLine = null,
        ?int $startColumn = null,
        ?int $endLine = null,
        ?int $endColumn = null
    ) {
        if (is_int($startLine)) {
            $this->startLine = $startLine;
        }
        if (is_int($startColumn)) {
            $this->startColumn = $startColumn;
        }
        if (is_int($endLine)) {
            $this->endLine = $endLine;
        }
        if (is_int($endColumn)) {
            $this->endColumn = $endColumn;
        }

        $required = [];
        $optional = [
            'startLine',
            'startColumn',
            'endLine',
            'endColumn',
            'charOffset',
            'charLength',
            'byteOffset',
            'byteLength',
            'snippet',
            'message',
            'sourceLanguage',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
