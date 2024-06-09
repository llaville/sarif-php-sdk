<?php declare(strict_types=1);

namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

final class EdgeTraversal extends Declaration
{
    protected string $edgeId;
    /**
     * @var array<string, Definition\MultiformatMessageString> $finalState
     */
    protected array $finalState;

    public function __construct()
    {
        $this->finalState = [];
    }

    public function edgeId(string $id): self
    {
        $this->edgeId = $id;
        return $this;
    }

    public function addFinalState(string $key, string $value): self
    {
        $this->finalState[$key] = new Definition\MultiformatMessageString($value);
        return $this;
    }

    /**
     * Builds a valued instance of EdgeTraversal definition.
     */
    public function build(): Definition\EdgeTraversal
    {
        $edgeTraversal = new Definition\EdgeTraversal($this->edgeId);
        $this->populate($edgeTraversal);
        $edgeTraversal->addAdditionalProperties($this->finalState);
        return $edgeTraversal;
    }
}
