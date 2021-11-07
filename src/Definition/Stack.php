<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Frames;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;

/**
 * A call stack that is relevant to a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317798
 * @author Laurent Laville
 */
final class Stack extends JsonSerializable
{
    /**
     * A message relevant to this call stack.
     */
    use MessageString;

    /**
     * An array of stack frames that represents a sequence of calls, rendered in reverse chronological order,
     * that comprise the call stack.
     */
    use Frames;

    /**
     * Key/value pairs that provide additional information about the stack.
     */
    use Properties;

    /**
     * @param StackFrame[] $frames
     */
    public function __construct(array $frames)
    {
        $this->addFrames($frames);

        $this->required = ['frames'];
        $this->optional = [
            'message',
            'properties',
        ];
    }
}
