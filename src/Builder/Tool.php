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
final class Tool extends Declaration
{
    protected Definition\ToolComponent $driver;
    /**
     * @var Definition\ToolComponent[] $extensions
     */
    protected array $extensions;

    public function driver(Driver $driver): self
    {
        $this->driver = $driver->build();
        return $this;
    }

    public function addExtension(Extension $extension): self
    {
        $this->extensions[] = $extension->build();
        return $this;
    }

    /**
     * Builds a valued instance of Tool definition.
     */
    public function build(): Definition\Tool
    {
        $tool = new Definition\Tool();
        $this->populate($tool);
        return $tool;
    }
}
