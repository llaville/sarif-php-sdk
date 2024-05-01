<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Factory;

use Bartlett\Sarif\Serializer\Encoder\EncoderInterface;
use Bartlett\Sarif\Serializer\Encoder\PhpJsonEncoder;
use Bartlett\Sarif\Serializer\JsonSerializer;
use Bartlett\Sarif\Serializer\SerializerInterface;

use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_SLASHES;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class PhpSerializerFactory implements SerializerFactory
{
    /**
     * @param EncoderInterface|null $realEncoder
     */
    public function createEncoder($realEncoder = null): EncoderInterface
    {
        if ($realEncoder instanceof EncoderInterface) {
            return $realEncoder;
        }
        return new PhpJsonEncoder(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function createSerializer(?EncoderInterface $realEncoder = null): SerializerInterface
    {
        return new JsonSerializer($this->createEncoder($realEncoder));
    }
}
