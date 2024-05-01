<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Serializer\Encoder;

use function json_encode;
use const JSON_HEX_AMP;
use const JSON_HEX_APOS;
use const JSON_HEX_QUOT;
use const JSON_HEX_TAG;
use const JSON_PRESERVE_ZERO_FRACTION;
use const JSON_PRETTY_PRINT;
use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class PhpJsonEncoder implements EncoderInterface
{
    /**
     * List of allowed options for {@see jsonEncodeFlags}.
     *
     * Bitmask consisting of JSON_*.
     *
     * Some JSON flags could break the output, so they are not whitelisted.
     *
     * @see https://www.php.net/manual/en/json.constants.php
     */
    private const JSON_ENCODE_FLAGS_ALLOWED_OPTIONS = 0
        | JSON_HEX_TAG
        | JSON_HEX_AMP
        | JSON_HEX_APOS
        | JSON_HEX_QUOT
        | JSON_PRETTY_PRINT
        | JSON_UNESCAPED_SLASHES
        | JSON_UNESCAPED_UNICODE
    ;

    /**
     * Defaults of {@see $jsonEncodeFlags}.
     *
     * Bitmask consisting of JSON_*.
     *
     * These defaults are required to have valid output in the end.
     *
     * @see https://www.php.net/manual/en/json.constants.php
     */
    private const JSON_ENCODE_FLAGS_DEFAULTS = 0
        | JSON_PRESERVE_ZERO_FRACTION // float/double not converted to int
    ;

    /**
     * List of mandatory options for $jsonEncodeFlags.
     *
     * Bitmask consisting of JSON_*.
     *
     * @see https://www.php.net/manual/en/json.constants.php
     */
    private const JSON_ENCODE_FLAGS_DEFAULT_OPTIONS = 0
        | JSON_UNESCAPED_SLASHES // urls become shorter
    ;

    /**
     * Flags for {@see json_encode()}.
     *
     * Bitmask consisting of JSON_*.
     *
     * @see https://www.php.net/manual/en/json.constants.php
     */
    protected int $jsonEncodeFlags;

    public function __construct(int $jsonEncodeFlags = self::JSON_ENCODE_FLAGS_DEFAULT_OPTIONS)
    {
        $this->jsonEncodeFlags = self::JSON_ENCODE_FLAGS_DEFAULTS
            | ($jsonEncodeFlags & self::JSON_ENCODE_FLAGS_ALLOWED_OPTIONS)
        ;
    }

    public function supportsEncoding(string $format): bool
    {
        return 'json' === $format;
    }

    /**
     * @inheritDoc
     */
    public function encode($data, string $format, array $context = [])
    {
        $jsonEncodeFlags = $context['json_encode_options'] ?? $this->jsonEncodeFlags;
        return json_encode($data, $jsonEncodeFlags);
    }
}
