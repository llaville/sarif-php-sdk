<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Stack extends Declaration
{
    /**
     * @var Definition\StackFrame[] $frames
     */
    protected array $frames;
    protected Definition\Message $message;

    public function message(string $text, string $id = ''): self
    {
        $this->message = new Definition\Message($text, $id);
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
        $stack = new Definition\Stack($this->frames);
        $this->populate($stack);
        return $stack;
    }
}
