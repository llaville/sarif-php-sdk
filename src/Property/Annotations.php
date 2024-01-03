<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Region;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait Annotations
{
    /**
     * @var Region[]
     */
    protected array $annotations;

    /**
     * @param Region[] $annotations
     */
    public function addAnnotations(array $annotations): void
    {
        foreach ($annotations as $annotation) {
            if ($annotation instanceof Region) {
                $this->annotations[] = $annotation;
            }
        }
    }
}
