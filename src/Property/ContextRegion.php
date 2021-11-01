<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Region;

/**
 * @author Laurent Laville
 */
trait ContextRegion
{
    /**
     * @var Region
     */
    protected $contextRegion;

    /**
     * @param Region $contextRegion
     */
    public function setContextRegion(Region $contextRegion): void
    {
        $this->contextRegion = $contextRegion;
    }
}
