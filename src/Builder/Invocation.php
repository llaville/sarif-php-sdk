<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Invocation extends Declaration
{
    protected bool $executionSuccessful;
    protected string $commandLine;
    /**
     * @var Definition\ConfigurationOverride[] $ruleConfigurationOverrides
     */
    protected array $ruleConfigurationOverrides;
    /**
     * @var Definition\Notification[] $toolExecutionNotifications
     */
    protected array $toolExecutionNotifications;

    public function executionSuccessful(bool $successful): self
    {
        $this->executionSuccessful = $successful;
        return $this;
    }

    public function commandLine(string $commandLine): self
    {
        $this->commandLine = $commandLine;
        return $this;
    }

    public function addToolExecutionNotification(Notification $notification): self
    {
        $this->toolExecutionNotifications[] = $notification->build();
        return $this;
    }

    public function addRuleConfigurationOverride(ConfigurationOverride $ruleConfigurationOverride): self
    {
        $this->ruleConfigurationOverrides[] = $ruleConfigurationOverride->build();
        return $this;
    }

    /**
     * Builds a valued instance of Invocation definition.
     */
    public function build(): Definition\Invocation
    {
        $invocation = new Definition\Invocation($this->executionSuccessful);
        $this->populate($invocation);
        return $invocation;
    }
}
