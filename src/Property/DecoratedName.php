<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * @author Laurent Laville
 */
trait DecoratedName
{
    /**
     * @var string
     */
    protected $decoratedName;

    /**
     * @param string $decoratedName
     */
    public function setDecoratedName(string $decoratedName): void
    {
        $this->decoratedName = $decoratedName;
    }
}
