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
