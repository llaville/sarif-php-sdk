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
 * @since Release 2.0.0
 */
final class Message extends Declaration
{
    protected string $text;
    protected string $markdown;
    protected string $id;
    /**
     * @var string[]
     */
    protected array $arguments;

    public function text(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function markdown(string $markdown): self
    {
        $this->markdown = $markdown;
        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function addArgument(string $argument): self
    {
        $this->arguments[] = $argument;
        return $this;
    }

    public function build(): Definition\Message
    {
        $message = new Definition\Message();
        $this->populate($message);
        return $message;
    }
}
