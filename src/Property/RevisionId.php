<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * @author Laurent Laville
 */
trait RevisionId
{
    /**
     * @var string
     */
    protected $revisionId;

    /**
     * @param string $revisionId
     */
    public function setRevisionId(string $revisionId): void
    {
        $this->revisionId = $revisionId;
    }
}
