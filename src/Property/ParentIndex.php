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
 * @since Release 1.0.0
 */
trait ParentIndex
{
    protected int $parentIndex;

    public function setParentIndex(int $parentIndex = -1): void
    {
        if ($parentIndex < -1) {
            throw new DomainException('Minimum value is -1. Expect to be greater, but have ' . $parentIndex);
        }
        $this->parentIndex = $parentIndex;
    }
}
