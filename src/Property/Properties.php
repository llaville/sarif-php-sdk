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
trait Properties
{
    /**
     * @var PropertyBag
     */
    protected $properties;

    /**
     * @param PropertyBag $propertyBag
     */
    public function setProperties(PropertyBag $propertyBag): void
    {
        $this->properties = $propertyBag;
    }
}
