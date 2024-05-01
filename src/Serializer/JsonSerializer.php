<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Serializer;

use Bartlett\Sarif\Serializer\Encoder\EncoderInterface;

use InvalidArgumentException;
use function sprintf;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
class JsonSerializer implements SerializerInterface
{
    protected EncoderInterface $encoder;

    public function __construct(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @inheritDoc
     */
    final public function serialize($data, string $format, array $context = [])
    {
        if (!$this->encoder->supportsEncoding($format)) {
            throw new InvalidArgumentException(
                sprintf('Serialization for the format "%s" is not supported.', $format)
            );
        }

        return $this->encoder->encode($data, $format, $context);
    }
}
