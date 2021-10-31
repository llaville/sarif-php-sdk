<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ArtifactLocation;

use function is_string;

/**
 * @author Laurent Laville
 */
trait OriginalUriBaseIds
{
    /**
     * @var array<string, ArtifactLocation>
     */
    protected $originalUriBaseIds;

    /**
     * @param array<string, ArtifactLocation> $additionalProperties
     * @see http://json-schema.org/understanding-json-schema/reference/object.html#additional-properties
     */
    public function addAdditionalProperties(array $additionalProperties): void
    {
        foreach ($additionalProperties as $key => $additionalProperty) {
            if (is_string($key) && $additionalProperty instanceof ArtifactLocation) {
                $this->originalUriBaseIds[$key] = $additionalProperty;
            }
        }
    }
}
