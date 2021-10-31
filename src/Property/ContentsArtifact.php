<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ArtifactContent;

/**
 * @author Laurent Laville
 */
trait ContentsArtifact
{
    /**
     * @var ArtifactContent
     */
    protected $contents;

    /**
     * @param ArtifactContent $contents
     */
    public function setContents(ArtifactContent $contents): void
    {
        $this->contents = $contents;
    }
}
