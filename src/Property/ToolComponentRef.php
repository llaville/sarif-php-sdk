<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ToolComponentReference;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait ToolComponentRef
{
    /**
     * @var ToolComponentReference
     */
    protected $toolComponent;

    /**
     * @param ToolComponentReference $toolComponent
     */
    public function setToolComponent(ToolComponentReference $toolComponent): void
    {
        $this->toolComponent = $toolComponent;
    }
}
