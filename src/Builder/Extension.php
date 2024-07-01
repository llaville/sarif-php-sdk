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
final class Extension extends Declaration
{
    protected string $name;
    protected string $version;

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function version(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Builds a valued instance of ToolComponent definition.
     */
    public function build(): Definition\ToolComponent
    {
        $extension = new Definition\ToolComponent();
        $this->populate($extension);
        return $extension;
    }
}
