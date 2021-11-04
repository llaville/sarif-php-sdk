<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\StackFrame;

/**
 * @author Laurent Laville
 */
trait Frames
{
    /**
     * @var StackFrame[]
     */
    protected $frames;

    /**
     * @param StackFrame[] $frames
     */
    public function addFrames(array $frames): void
    {
        foreach ($frames as $frame) {
            if ($frame instanceof StackFrame) {
                $this->frames[] = $frame;
            }
        }
    }
}
