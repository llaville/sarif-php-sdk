<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class AutomationDetails extends Declaration
{
    protected Definition\Message $description;
    protected string $id;
    protected string $guid;
    protected string $correlationGuid;

    /**
     * @param string[] $arguments
     */
    public function description(string $text, string $id = '', array $arguments = []): self
    {
        $message = new Definition\Message($text, $id);
        $message->addArguments($arguments);
        $this->description = $message;
        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function correlationGuid(string $correlationGuid): self
    {
        $this->correlationGuid = $correlationGuid;
        return $this;
    }

    /**
     * Builds a valued instance of RunAutomationDetails definition.
     */
    public function build(): Definition\RunAutomationDetails
    {
        $automationDetails = new Definition\RunAutomationDetails();
        $this->populate($automationDetails);
        return $automationDetails;
    }
}
