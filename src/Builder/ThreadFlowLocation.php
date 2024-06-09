<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ThreadFlowLocation extends Declaration
{
    protected ?Definition\Location $location;
    protected int $nestingLevel;
    protected int $executionOrder;
    /**
     * @var array<string, Definition\MultiformatMessageString> $additionalProperties
     */
    protected array $additionalProperties;

    public function __construct()
    {
        $this->additionalProperties = [];
    }

    public function location(Location $location): self
    {
        $this->location = $location->build();
        return $this;
    }

    public function nestingLevel(int $level): self
    {
        $this->nestingLevel = $level;
        return $this;
    }

    public function executionOrder(int $order): self
    {
        $this->executionOrder = $order;
        return $this;
    }

    public function addAdditionalProperty(string $key, string $value): self
    {
        $this->additionalProperties[$key] = new Definition\MultiformatMessageString($value);
        return $this;
    }

    /**
     * Builds a valued instance of ThreadFlowLocation definition.
     */
    public function build(): Definition\ThreadFlowLocation
    {
        $threadFlowLocation = new Definition\ThreadFlowLocation();
        $this->populate($threadFlowLocation);
        $threadFlowLocation->addAdditionalProperties($this->additionalProperties);
        return $threadFlowLocation;
    }
}
