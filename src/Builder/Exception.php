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
final class Exception extends Declaration
{
    protected string $kind;
    protected string $message;
    protected Definition\Stack $stack;
    /**
     * @var Definition\Exception[] $innerExceptions
     */
    protected array $innerExceptions;

    public function kind(string $kind): self
    {
        $this->kind = $kind;
        return $this;
    }

    public function message(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function stack(Stack $stack): self
    {
        $this->stack = $stack->build();
        return $this;
    }

    public function addInnerExceptions(Exception $exception): self
    {
        $this->innerExceptions[] = $exception->build();
        return $this;
    }

    /**
     * Builds a valued instance of Exception definition.
     */
    public function build(): Definition\Exception
    {
        $exception = new Definition\Exception();
        $this->populate($exception);
        return $exception;
    }
}
