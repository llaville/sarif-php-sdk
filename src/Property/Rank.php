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
trait Rank
{
    /**
     * @var float
     */
    protected $rank;

    /**
     * @param float $rank
     */
    public function setRank(float $rank = -1): void
    {
        if ($rank < -1) {
            throw new DomainException('Minimum value is -1. Expect to be greater, but have ' . $rank);
        }
        if ($rank > 100) {
            throw new DomainException('Maximum value is 100. Expect to be lower, but have ' . $rank);
        }
        $this->rank = $rank;
    }
}
