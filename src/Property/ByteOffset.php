<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * @author Laurent Laville
 */
trait ByteOffset
{
    /**
     * @var int
     */
    protected $byteOffset;

    /**
     * @param int $byteOffset
     */
    public function setByteOffset(int $byteOffset = -1): void
    {
        if ($byteOffset < -1) {
            throw new \DomainException('Minimum value is -1. Expect to be greater, but have ' . $byteOffset);
        }
        $this->byteOffset = $byteOffset;
    }
}
