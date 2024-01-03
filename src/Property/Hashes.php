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
 * @since Release 1.0.0
 */
trait Hashes
{
    /**
     * @var array<string, mixed>
     */
    protected array $hashes;

    /**
     * @param array<string, mixed> $hashes
     */
    public function addHashes(array $hashes): void
    {
        foreach ($hashes as $key => $value) {
            if (is_string($key)) {
                $this->hashes[$key] = $value;
            }
        }
    }
}
