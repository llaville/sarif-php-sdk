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
final class Replacement extends Declaration
{
    protected Definition\Region $deletedRegion;
    protected Definition\ArtifactContent $insertedContent;

    public function deletedRegion(Region $region): self
    {
        $this->deletedRegion = $region->build();
        return $this;
    }

    public function insertedContent(ArtifactContent $artifactContent): self
    {
        $this->insertedContent = $artifactContent->build();
        return $this;
    }

    /**
     * Builds a valued instance of Replacement definition.
     */
    public function build(): Definition\Replacement
    {
        $replacement = new Definition\Replacement($this->deletedRegion);
        $this->populate($replacement);
        return $replacement;
    }
}
