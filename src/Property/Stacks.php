<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Stack;

/**
 * @author Laurent Laville
 */
trait Stacks
{
    /**
     * @var Stack[]
     */
    protected $stacks;

    /**
     * @param Stack[] $stacks
     */
    public function addStacks(array $stacks): void
    {
        foreach ($stacks as $stack) {
            if ($stack instanceof Stack) {
                $this->stacks[] = $stack;
            }
        }
    }
}
