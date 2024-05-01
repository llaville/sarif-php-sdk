<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Serializer\Encoder;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
interface EncoderInterface
{
    public function supportsEncoding(string $format): bool;

    /**
     * @param mixed $data
     * @param array{}|array{'json_encode_options': int} $context Options that encoders have access to
     * @return string|false
     */
    public function encode($data, string $format, array $context = []);
}
