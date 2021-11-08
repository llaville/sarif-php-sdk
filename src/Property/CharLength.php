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
trait CharLength
{
    /**
     * @var int
     */
    protected $charLength;

    /**
     * @param int $charLength
     */
    public function setCharLength(int $charLength): void
    {
        if ($charLength < 0) {
            throw new DomainException('Minimum value is 0. Expect to be greater, but have ' . $charLength);
        }
        $this->charLength = $charLength;
    }
}
