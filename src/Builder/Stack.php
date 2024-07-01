<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class Stack extends Declaration
{
    /**
     * @var Definition\StackFrame[] $frames
     */
    protected array $frames;
    protected Definition\Message $message;

    public function message(string $text, string $id = ''): self
    {
        $this->message = new Definition\Message();
        $this->message->setText($text);
        $this->message->setId($id);
        return $this;
    }

    public function addFrame(StackFrame $frame): self
    {
        $this->frames[] = $frame->build();
        return $this;
    }

    /**
     * Builds a valued instance of Stack definition.
     */
    public function build(): Definition\Stack
    {
        $stack = new Definition\Stack();
        $this->populate($stack);
        return $stack;
    }
}
