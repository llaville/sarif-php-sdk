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
final class EdgeTraversal extends Declaration
{
    protected string $edgeId;
    /**
     * @var array<string, Definition\MultiformatMessageString> $finalState
     */
    protected array $finalState;

    public function edgeId(string $id): self
    {
        $this->edgeId = $id;
        return $this;
    }

    public function addFinalState(string $key, string $value): self
    {
        $state = new Definition\MultiformatMessageString();
        $state->setText($value);
        $this->finalState[$key] = $state;
        return $this;
    }

    /**
     * Builds a valued instance of EdgeTraversal definition.
     */
    public function build(): Definition\EdgeTraversal
    {
        $edgeTraversal = new Definition\EdgeTraversal();
        $this->populate($edgeTraversal);
        $edgeTraversal->addAdditionalProperties($this->finalState);
        return $edgeTraversal;
    }
}
