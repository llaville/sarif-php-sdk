<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ExternalPropertyFileReferences;

/**
 * @author Laurent Laville
 */
trait ExternalPropertyFileReferencesInlined
{
    /**
     * @var ExternalPropertyFileReferences
     */
    protected $externalPropertyFileReferences;

    /**
     * @param ExternalPropertyFileReferences $externalPropertyFileReferences
     */
    public function setExternalPropertyFileReferences(ExternalPropertyFileReferences $externalPropertyFileReferences): void
    {
        $this->externalPropertyFileReferences = $externalPropertyFileReferences;
    }
}
