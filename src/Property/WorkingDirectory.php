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
trait WorkingDirectory
{
    /**
     * @var ArtifactLocation
     */
    protected $workingDirectory;

    /**
     * @param ArtifactLocation $workingDirectory
     */
    public function setWorkingDirectory(ArtifactLocation $workingDirectory): void
    {
        $this->workingDirectory = $workingDirectory;
    }
}
