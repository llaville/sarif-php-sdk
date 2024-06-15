<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Builder;

use Bartlett\Sarif\Definition;

/**
 * @author Laurent Laville
 * @since Release 1.5.0
 */
final class ToolComponent extends Declaration
{
    protected string $name;
    protected string $guid;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    /**
     * Builds a valued instance of ToolComponentReference definition.
     */
    public function build(): Definition\ToolComponentReference
    {
        $toolComponent = new Definition\ToolComponentReference();
        $this->populate($toolComponent);
        return $toolComponent;
    }
}
