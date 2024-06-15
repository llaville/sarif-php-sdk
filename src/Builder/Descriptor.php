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
final class Descriptor extends Declaration
{
    protected int $index;
    protected string $id;

    public function index(int $index): self
    {
        $this->index = $index;
        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Builds a valued instance of ReportingDescriptorReference definition.
     */
    public function build(): Definition\ReportingDescriptorReference
    {
        $descriptor = new Definition\ReportingDescriptorReference();
        $this->populate($descriptor);
        return $descriptor;
    }
}
