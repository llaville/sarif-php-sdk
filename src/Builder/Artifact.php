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
final class Artifact extends Declaration
{
    protected ?int $length;
    protected Definition\ArtifactLocation $location;
    protected ?string $mimeType;
    protected ?int $offset;
    protected ?int $parentIndex;

    public function length(int $length): self
    {
        $this->length = $length;
        return $this;
    }

    public function location(ArtifactLocation $location): self
    {
        $this->location = $location->build();
        return $this;
    }

    public function mimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function parentIndex(int $index): self
    {
        $this->parentIndex = $index;
        return $this;
    }

    /**
     * Builds a valued instance of Artifact definition.
     */
    public function build(): Definition\Artifact
    {
        $artifact = new Definition\Artifact();
        $this->populate($artifact);
        return $artifact;
    }
}
