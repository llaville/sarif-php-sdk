<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use JsonSerializable;

/**
 * Key/value pairs that provide additional information about the object.
 *
 * @author Laurent Laville
 */
final class PropertyBag implements JsonSerializable
{
    /**
     * A set of distinct strings that provide additional information.
     * @var string[]
     */
    private $tags;

    public function __construct()
    {
        $this->tags = [];
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function addProperty(string $key, $value): void
    {
        $this->tags[$key] = $value;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->tags;
    }
}
