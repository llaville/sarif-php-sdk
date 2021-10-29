<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ToolComponent;

/**
 * @author Laurent Laville
 */
trait Driver
{
    /**
     * @var ToolComponent
     */
    protected $driver;

    /**
     * @param ToolComponent $driver
     */
    public function setDriver(ToolComponent $driver): void
    {
        $this->driver = $driver;
    }
}
