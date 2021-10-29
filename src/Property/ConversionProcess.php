<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Conversion;

/**
 * @author Laurent Laville
 */
trait ConversionProcess
{
    /**
     * @var Conversion
     */
    protected $conversion;

    /**
     * @param Conversion $conversion
     */
    public function setConversion(Conversion $conversion): void
    {
        $this->conversion = $conversion;
    }
}
