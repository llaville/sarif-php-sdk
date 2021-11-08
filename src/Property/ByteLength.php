<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use DomainException;

/**
 * @author Laurent Laville
 */
trait ByteLength
{
    /**
     * @var int
     */
    protected $byteLength;

    /**
     * @param int $byteLength
     */
    public function setByteLength(int $byteLength): void
    {
        if ($byteLength < 0) {
            throw new DomainException('Minimum value is 0. Expect to be greater, but have ' . $byteLength);
        }
        $this->byteLength = $byteLength;
    }
}
