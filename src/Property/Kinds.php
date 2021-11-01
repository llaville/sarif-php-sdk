<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use function is_string;

/**
 * @author Laurent Laville
 */
trait Kinds
{
    /**
     * @var string[]
     */
    protected $kinds;

    /**
     * @param string[] $kinds
     */
    public function addKinds(array $kinds): void
    {
        foreach ($kinds as $kind) {
            if (is_string($kind)) {
                $this->kinds[] = $kind;
            }
        }
    }
}
