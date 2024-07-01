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
final class ArtifactChange extends Declaration
{
    protected Definition\ArtifactLocation $artifactLocation;
    /**
     * @var Definition\Replacement[] $replacements
     */
    protected array $replacements;

    public function artifactLocation(ArtifactLocation $location): self
    {
        $this->artifactLocation = $location->build();
        return $this;
    }
    public function addReplacement(Replacement $replacement): self
    {
        $this->replacements[] = $replacement->build();
        return $this;
    }

    /**
     * Builds a valued instance of ArtifactChange definition.
     */
    public function build(): Definition\ArtifactChange
    {
        $artifactChange = new Definition\ArtifactChange(
            $this->artifactLocation,
            $this->replacements ?? []
        );
        $this->populate($artifactChange);
        return $artifactChange;
    }
}
