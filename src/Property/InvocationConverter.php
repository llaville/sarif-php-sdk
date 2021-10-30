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
 */
trait InvocationConverter
{
    /**
     * @var Invocation
     */
    protected $invocation;

    /**
     * @param Invocation $invocation
     */
    public function setInvocation(Invocation $invocation): void
    {
        $this->invocation = $invocation;
    }
}
