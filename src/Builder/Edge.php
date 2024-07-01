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
final class Edge extends Declaration
{
    protected string $id;
    protected string $sourceNodeId;
    protected string $targetNodeId;

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function sourceNodeId(string $id): self
    {
        $this->sourceNodeId = $id;
        return $this;
    }

    public function targetNodeId(string $id): self
    {
        $this->targetNodeId = $id;
        return $this;
    }

    /**
     * Builds a valued instance of Edge definition.
     */
    public function build(): Definition\Edge
    {
        $edge = new Definition\Edge();
        $this->populate($edge);
        return $edge;
    }
}
