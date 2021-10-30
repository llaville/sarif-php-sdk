<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ArtifactLocation;

/**
 * @author Laurent Laville
 */
trait MappedTo
{
    /**
     * @var ArtifactLocation
     */
    protected $mappedTo;

    /**
     * @param ArtifactLocation $mappedTo
     */
    public function setMappedTo(ArtifactLocation $mappedTo): void
    {
        $this->mappedTo = $mappedTo;
    }
}
