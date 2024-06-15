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
final class Region extends Declaration
{
    protected ?int $startLine;
    protected ?int $startColumn;
    protected ?int $endLine;
    protected ?int $endColumn;
    protected \Bartlett\Sarif\Definition\ArtifactContent $snippet;

    public function startLine(int $line): self
    {
        $this->startLine = $line;
        return $this;
    }

    public function startColumn(int $column): self
    {
        $this->startColumn = $column;
        return $this;
    }

    public function endLine(int $line): self
    {
        $this->endLine = $line;
        return $this;
    }

    public function endColumn(int $column): self
    {
        $this->endColumn = $column;
        return $this;
    }

    public function snippet(ArtifactContent $snippet): self
    {
        $this->snippet = $snippet->build();
        return $this;
    }

    /**
     * Builds a valued instance of Region definition.
     */
    public function build(): Definition\Region
    {
        $region = new Definition\Region();
        $this->populate($region);
        return $region;
    }
}
