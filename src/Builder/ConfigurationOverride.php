<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class ConfigurationOverride extends Declaration
{
    protected Definition\ReportingConfiguration $configuration;
    protected Definition\ReportingDescriptorReference $descriptor;

    public function configuration(Configuration $configuration): self
    {
        $this->configuration = $configuration->build();
        return $this;
    }

    public function descriptor(Descriptor $descriptor): self
    {
        $this->descriptor = $descriptor->build();
        return $this;
    }

    /**
     * Builds a valued instance of ConfigurationOverride definition.
     */
    public function build(): Definition\ConfigurationOverride
    {
        $configOverride = new Definition\ConfigurationOverride();
        $this->populate($configOverride);
        return $configOverride;
    }
}
