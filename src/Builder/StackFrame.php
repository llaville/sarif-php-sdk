<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class StackFrame extends Declaration
{
    protected Definition\Location $location;
    protected string $module;
    protected int $threadId;
    /**
     * @var string[]
     */
    protected array $parameters;

    public function location(Location $location): self
    {
        $this->location = $location->build();
        return $this;
    }

    public function module(string $module): self
    {
        $this->module = $module;
        return $this;
    }

    public function threadId(int $threadId): self
    {
        $this->threadId = $threadId;
        return $this;
    }

    public function addParameter(string $parameter): self
    {
        $this->parameters[] = $parameter;
        return $this;
    }

    /**
     * Builds a valued instance of StackFrame definition.
     */
    public function build(): Definition\StackFrame
    {
        $frame = new Definition\StackFrame();
        $this->populate($frame);
        return $frame;
    }
}
