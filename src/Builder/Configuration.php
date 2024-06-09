<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class Configuration extends Declaration
{
    protected bool $enabled;
    protected string $level;
    protected float $rank;
    protected Definition\PropertyBag $parameters;

    public function enabled(bool $enable): self
    {
        $this->enabled = $enable;
        return $this;
    }

    public function level(string $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function rank(float $rank): self
    {
        $this->rank = $rank;
        return $this;
    }

    /**
     * @param array<string, mixed> $params
     */
    public function parameters(array $params): self
    {
        $this->parameters = new Definition\PropertyBag($params);
        return $this;
    }

    /**
     * Builds a valued instance of ReportingConfiguration definition.
     */
    public function build(): Definition\ReportingConfiguration
    {
        $config = new Definition\ReportingConfiguration();
        $this->populate($config);
        return $config;
    }
}
