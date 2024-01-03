<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Rectangle;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait Rectangles
{
    /**
     * @var Rectangle[]
     */
    protected array $rectangles;

    /**
     * @param Rectangle[] $rectangles
     */
    public function addRectangles(array $rectangles): void
    {
        foreach ($rectangles as $rectangle) {
            if ($rectangle instanceof Rectangle) {
                $this->rectangles[] = $rectangle;
            }
        }
    }
}
