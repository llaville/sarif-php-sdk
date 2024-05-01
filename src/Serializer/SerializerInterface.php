<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Serializer;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
interface SerializerInterface
{
    /**
     * @param mixed $data
     * @param array<string, mixed> $context Options that serializers have access to
     * @return string|false
     */
    public function serialize($data, string $format, array $context = []);
}
