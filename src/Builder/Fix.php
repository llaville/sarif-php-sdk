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
final class Fix extends Declaration
{
    /**
     * @var Definition\ArtifactChange[] $artifactChanges
     */
    protected array $artifactChanges;

    public function __construct()
    {
        $this->artifactChanges = [];
    }

    public function addArtifactChange(ArtifactChange $artifactChange): self
    {
        $this->artifactChanges[] = $artifactChange->build();
        return $this;
    }

    /**
     * Builds a valued instance of Fix definition.
     */
    public function build(): Definition\Fix
    {
        $fix = new Definition\Fix();
        $this->populate($fix);
        return $fix;
    }
}
