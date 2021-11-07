<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ExternalPropertyFileReference;

/**
 * @author Laurent Laville
 */
trait ExternalPropertyFileReferenceConversion
{
    /**
     * @var ExternalPropertyFileReference
     */
    protected $conversion;

    /**
     * @param ExternalPropertyFileReference $conversion
     */
    public function setConversion(ExternalPropertyFileReference $conversion): void
    {
        $this->conversion = $conversion;
    }
}
