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
trait Rendered
{
    /**
     * @var MultiformatMessageString
     */
    protected $rendered;

    /**
     * @param MultiformatMessageString $rendered
     */
    public function setRendered(MultiformatMessageString $rendered): void
    {
        $this->rendered = $rendered;
    }
}
