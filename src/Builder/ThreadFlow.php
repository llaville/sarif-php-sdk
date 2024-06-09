<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ThreadFlow extends Declaration
{
    protected ?string $id;
    /**
     * @var Definition\ThreadFlowLocation[] $locations
     */
    protected array $locations;
    protected Definition\Message $message;

    public function __construct()
    {
        $this->locations = [];
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function message(string $messageText, string $messageId = ''): self
    {
        $this->message = new Definition\Message($messageText, $messageId);
        return $this;
    }

    public function addLocation(ThreadFlowLocation $location): self
    {
        $this->locations[] = $location->build();
        return $this;
    }

    /**
     * Builds a valued instance of ThreadFlow definition.
     */
    public function build(): Definition\ThreadFlow
    {
        $threadFlow = new Definition\ThreadFlow($this->locations);
        $this->populate($threadFlow);
        return $threadFlow;
    }
}
