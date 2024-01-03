<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Invocation;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait Invocations
{
    /**
     * @var Invocation[]
     */
    protected array $invocations;

    /**
     * @param Invocation[] $invocations
     */
    public function addInvocations(array $invocations): void
    {
        foreach ($invocations as $invocation) {
            if ($invocation instanceof Invocation) {
                $this->invocations[] = $invocation;
            }
        }
    }
}
