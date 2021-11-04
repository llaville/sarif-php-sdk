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
trait Parameters
{
    /**
     * @var string[]
     */
    protected $parameters;

    /**
     * @param string[] $parameters
     */
    public function addParameters(array $parameters): void
    {
        foreach ($parameters as $parameter) {
            if (is_string($parameter)) {
                $this->parameters[] = $parameter;
            }
        }
    }
}
