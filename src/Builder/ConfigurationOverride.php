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
