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
trait Arguments
{
    /**
     * @var string[]
     */
    protected $arguments;

    /**
     * @param string[] $arguments
     */
    public function addArguments(array $arguments): void
    {
        foreach ($arguments as $argument) {
            if (is_string($argument)) {
                $this->arguments[] = $argument;
            }
        }
    }
}
