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
