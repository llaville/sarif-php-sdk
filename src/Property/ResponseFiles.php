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
trait ResponseFiles
{
    /**
     * @var ArtifactLocation[]
     */
    protected $responseFiles;

    /**
     * @param ArtifactLocation[] $responseFiles
     */
    public function addResponseFiles(array $responseFiles): void
    {
        foreach ($responseFiles as $responseFile) {
            if ($responseFile instanceof ArtifactLocation) {
                $this->responseFiles[] = $responseFile;
            }
        }
    }
}
