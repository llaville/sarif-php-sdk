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
