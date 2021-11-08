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
trait StepOverEdgeCount
{
    /**
     * @var int
     */
    protected $stepOverEdgeCount;

    /**
     * @param int $stepOverEdgeCount
     */
    public function setStepOverEdgeCount(int $stepOverEdgeCount): void
    {
        if ($stepOverEdgeCount < 0) {
            throw new DomainException('Minimum value is 0. Expect to be greater, but have ' . $stepOverEdgeCount);
        }
        $this->stepOverEdgeCount = $stepOverEdgeCount;
    }
}
