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
final class VersionControlDetails extends Declaration
{
    protected string $repositoryUri;
    protected string $revisionId;
    protected Definition\ArtifactLocation $mappedTo;

    public function repositoryUri(string $uri): self
    {
        $this->repositoryUri = $uri;
        return $this;
    }

    public function revisionId(string $revision): self
    {
        $this->revisionId = $revision;
        return $this;
    }

    public function mappedTo(ArtifactLocation $mappedTo): self
    {
        $this->mappedTo = $mappedTo->build();
        return $this;
    }

    /**
     * Builds a valued instance of VersionControlDetails definition.
     */
    public function build(): Definition\VersionControlDetails
    {
        $vcd = new Definition\VersionControlDetails();
        $this->populate($vcd);
        return $vcd;
    }
}
