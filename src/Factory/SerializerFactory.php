<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Factory;

use Bartlett\Sarif\Serializer\Encoder\EncoderInterface;
use Bartlett\Sarif\Serializer\SerializerInterface;

/**
 * @author Laurent Laville
 * @since Release 1.2.0
 */
interface SerializerFactory
{
    public function createEncoder(?EncoderInterface $realEncoder = null): EncoderInterface;

    public function createSerializer(?EncoderInterface $realEncoder = null): SerializerInterface;
}
