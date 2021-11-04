<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\PropertyBag;

/**
 * @author Laurent Laville
 */
trait ParameterBag
{
    /**
     * @var PropertyBag
     */
    protected $parameters;

    /**
     * @param PropertyBag $parameters
     */
    public function setParameters(PropertyBag $parameters): void
    {
        $this->parameters = $parameters;
    }
}
