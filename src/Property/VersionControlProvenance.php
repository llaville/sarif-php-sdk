<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\VersionControlDetails;

/**
 * @author Laurent Laville
 */
trait VersionControlProvenance
{
    /**
     * @var VersionControlDetails[]
     */
    protected $versionControlProvenance;

    /**
     * @param VersionControlDetails[] $versionControlDetails
     */
    public function addVersionControlDetails(array $versionControlDetails): void
    {
        foreach ($versionControlDetails as $versionControlDetail) {
            if ($versionControlDetail instanceof VersionControlDetails) {
                $this->versionControlProvenance[] = $versionControlDetail;
            }
        }
    }
}
