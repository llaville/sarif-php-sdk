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
trait InvocationIndex
{
    /**
     * @var int
     */
    protected $invocationIndex;

    /**
     * @param int $invocationIndex
     */
    public function setInvocationIndex(int $invocationIndex = -1): void
    {
        if ($invocationIndex < -1) {
            throw new DomainException('Minimum value is -1. Expect to be greater, but have ' . $invocationIndex);
        }
        $this->invocationIndex = $invocationIndex;
    }
}
