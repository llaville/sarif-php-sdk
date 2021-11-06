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
trait InsertedContent
{
    /**
     * @var ArtifactContent
     */
    protected $insertedContent;

    /**
     * @param ArtifactContent $insertedContent
     */
    public function setInsertedContent(ArtifactContent $insertedContent): void
    {
        $this->insertedContent = $insertedContent;
    }
}
