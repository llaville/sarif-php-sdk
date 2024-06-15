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
final class GraphTraversal extends Declaration
{
    protected int $runGraphIndex;
    protected int $resultGraphIndex;
    /**
     * @var array<string, Definition\MultiformatMessageString> $initialState
     */
    protected array $initialState;
    /**
     * @var Definition\EdgeTraversal[] $edgeTraversals
     */
    protected array $edgeTraversals;

    public function runGraphIndex(int $runGraphIndex): self
    {
        $this->runGraphIndex = $runGraphIndex;
        return $this;
    }

    public function resultGraphIndex(int $resultGraphIndex): self
    {
        $this->resultGraphIndex = $resultGraphIndex;
        return $this;
    }

    public function addInitialState(string $key, string $value): self
    {
        $this->initialState[$key] = new Definition\MultiformatMessageString($value);
        return $this;
    }

    public function addEdgeTraversal(EdgeTraversal $edgeTraversal): self
    {
        $this->edgeTraversals[] = $edgeTraversal->build();
        return $this;
    }

    /**
     * Builds a valued instance of GraphTraversal definition.
     */
    public function build(): Definition\GraphTraversal
    {
        $graphTraversal = new Definition\GraphTraversal();
        $this->populate($graphTraversal);
        $graphTraversal->addAdditionalPropertiesInitialState($this->initialState);
        return $graphTraversal;
    }
}
