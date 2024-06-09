<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

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
