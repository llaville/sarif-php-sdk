<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Artifact;

/**
 * @author Laurent Laville
 */
trait Artifacts
{
    /**
     * @var Artifact[]
     */
    protected $artifacts;

    /**
     * @param Artifact[] $artifacts
     */
    public function addArtifacts(array $artifacts): void
    {
        foreach ($artifacts as $artifact) {
            if ($artifact instanceof Artifact) {
                $this->artifacts[] = $artifact;
            }
        }
    }
}
