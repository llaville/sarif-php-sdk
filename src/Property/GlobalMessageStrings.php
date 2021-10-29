<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\MultiformatMessageString;

/**
 * @author Laurent Laville
 */
trait GlobalMessageStrings
{
    /**
     * @var MultiformatMessageString
     */
    protected $globalMessageStrings;

    /**
     * @param MultiformatMessageString $globalMessageStrings
     */
    public function setGlobalMessageStrings(MultiformatMessageString $globalMessageStrings): void
    {
        $this->globalMessageStrings = $globalMessageStrings;
    }
}
