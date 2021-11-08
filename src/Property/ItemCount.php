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
trait ItemCount
{
    /**
     * @var int
     */
    protected $itemCount;

    /**
     * @param int $itemCount
     */
    public function setItemCount(int $itemCount = -1): void
    {
        if ($itemCount < -1) {
            throw new DomainException('Minimum value is -1. Expect to be greater, but have ' . $itemCount);
        }
        $this->itemCount = $itemCount;
    }
}
