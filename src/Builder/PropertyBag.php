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
final class PropertyBag
{
    /**
     * @var array<string, string>
     */
    protected array $tags;

    public function addProperty(string $key, string $value): self
    {
        $this->tags[$key] = $value;
        return $this;
    }

    /**
     * Builds a valued instance of PropertyBag definition.
     */
    public function build(): Definition\PropertyBag
    {
        $bag = new Definition\PropertyBag();
        $bag->addProperties($this->tags);
        return $bag;
    }
}
