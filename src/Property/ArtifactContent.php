<?php declare(strict_types=1);

namespace Bartlett\Sarif\Property;

trait ArtifactContent
{
    /**
     * @var \Bartlett\Sarif\Definition\ArtifactContent
     */
    protected $contents;

    /**
     * @param \Bartlett\Sarif\Definition\ArtifactContent $contents
     */
    public function setContents(\Bartlett\Sarif\Definition\ArtifactContent $contents): void
    {
        $this->contents = $contents;
    }
}
