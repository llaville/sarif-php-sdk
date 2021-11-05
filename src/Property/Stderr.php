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
trait Stderr
{
    /**
     * @var ArtifactLocation
     */
    protected $stderr;

    /**
     * @param ArtifactLocation $stderr
     */
    public function setStderr(ArtifactLocation $stderr): void
    {
        $this->stderr = $stderr;
    }
}
