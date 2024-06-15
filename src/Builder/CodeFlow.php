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
final class CodeFlow extends Declaration
{
    protected Definition\Message $message;
    /**
     * @var Definition\ThreadFlow[] $threadFlows
     */
    protected array $threadFlows;

    public function message(string $messageText, string $messageId = ''): self
    {
        $this->message = new Definition\Message($messageText, $messageId);
        return $this;
    }

    public function threadFlow(ThreadFlow $threadFlow): self
    {
        $this->threadFlows[] = $threadFlow->build();
        return $this;
    }

    /**
     * Builds a valued instance of CodeFlow definition.
     */
    public function build(): Definition\CodeFlow
    {
        $codeFlow = new Definition\CodeFlow($this->threadFlows);
        $this->populate($codeFlow);
        return $codeFlow;
    }
}
