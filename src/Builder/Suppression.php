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
final class Suppression extends Declaration
{
    protected string $kind;
    protected string $guid;
    protected string $status;
    protected string $justification;

    public function kind(string $kind): self
    {
        $this->kind = $kind;
        return $this;
    }

    public function guid(string $guid): self
    {
        $this->guid = $guid;
        return $this;
    }

    public function status(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function justification(string $justification): self
    {
        $this->justification = $justification;
        return $this;
    }

    /**
     * Builds a valued instance of Suppression definition.
     */
    public function build(): Definition\Suppression
    {
        $suppression = new Definition\Suppression();
        $this->populate($suppression);
        return $suppression;
    }
}
