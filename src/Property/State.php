<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\MultiformatMessageString;

/**
 * @author Laurent Laville
 */
trait State
{
    /**
     * @var array<string, MultiformatMessageString>
     */
    protected $state;

    /**
     * @param array<string, MultiformatMessageString> $additionalProperties
     * @see http://json-schema.org/understanding-json-schema/reference/object.html#additional-properties
     */
    public function addAdditionalProperties(array $additionalProperties): void
    {
        foreach ($additionalProperties as $key => $additionalProperty) {
            if (is_string($key) && $additionalProperty instanceof MultiformatMessageString) {
                $this->state[$key] = $additionalProperty;
            }
        }
    }
}
