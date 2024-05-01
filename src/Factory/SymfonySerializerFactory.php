<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Factory;

use Bartlett\Sarif\Serializer\Encoder\EncoderInterface;
use Bartlett\Sarif\Serializer\Encoder\SymfonyJsonEncoder;
use Bartlett\Sarif\Serializer\JsonSerializer;
use Bartlett\Sarif\Serializer\SerializerInterface;

use Symfony\Component\Serializer\Encoder\JsonEncode;

use InvalidArgumentException;
use function sprintf;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class SymfonySerializerFactory implements SerializerFactory
{
    /**
     * @param JsonEncode|null $realEncoder
     */
    public function createEncoder($realEncoder = null): EncoderInterface
    {
        if (null === $realEncoder || $realEncoder instanceof JsonEncode) {
            return new SymfonyJsonEncoder($realEncoder);
        }

        throw new InvalidArgumentException(
            sprintf('$realEncoder must be an instance of "%s" or null', JsonEncode::class)
        );
    }

    public function createSerializer(?EncoderInterface $realEncoder = null): SerializerInterface
    {
        if (null === $realEncoder) {
            $encoder = $this->createEncoder($realEncoder);
        } else {
            $encoder = $realEncoder;
        }
        return new JsonSerializer($encoder);
    }
}
