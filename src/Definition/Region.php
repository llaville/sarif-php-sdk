<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\ByteLength;
use Bartlett\Sarif\Property\ByteOffset;
use Bartlett\Sarif\Property\CharLength;
use Bartlett\Sarif\Property\CharOffset;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Snippet;
use Bartlett\Sarif\Property\SourceLanguage;

/**
 * A region within an artifact where a result was detected.
 *
 * @author Laurent Laville
 */
final class Region extends JsonSerializable
{
    /**
     * The line number of the first character in the region.
     * @var int
     */
    protected $startLine;

    /**
     * The column number of the first character in the region.
     * @var int
     */
    protected $startColumn;

    /**
     * The line number of the last character in the region.
     * @var int
     */
    protected $endLine;

    /**
     * The column number of the character following the end of the region.
     * @var int
     */
    protected $endColumn;

    /**
     * The zero-based offset from the beginning of the artifact of the first character in the region.
     */
    use CharOffset;

    /**
     * The length of the region in characters.
     */
    use CharLength;

    /**
     * The zero-based offset from the beginning of the artifact of the first byte in the region.
     */
    use ByteOffset;

    /**
     * The length of the region in bytes.
     */
    use ByteLength;

    /**
     * The portion of the artifact contents within the specified region.
     */
    use Snippet;

    /**
     * A message relevant to the region.
     */
    use MessageString;

    /**
     * Specifies the source language, if any, of the portion of the artifact specified by the region object.
     */
    use SourceLanguage;

    /**
     * Key/value pairs that provide additional information about the region.
     */
    use Properties;

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
        $this->startLine = $startLine;
        $this->startColumn = $startColumn;
        $this->endLine = $endLine;
        $this->endColumn = $endColumn;

        $this->required = [];
        $this->optional = [
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
    }
}
