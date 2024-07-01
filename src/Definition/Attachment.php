<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property;

/**
 * An artifact relevant to a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317591
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Attachment extends JsonSerializable
{
    /**
     * A message describing the role played by the attachment.
     */
    use Property\Description;

    /**
     * The location of the attachment.
     */
    use Property\LocationAttachment;

    /**
     * An array of regions of interest within the attachment.
     */
    use Property\Regions;

    /**
     * An array of rectangles specifying areas of interest within the image.
     */
    use Property\Rectangles;

    /**
     * Key/value pairs that provide additional information about the attachment.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['artifactLocation'];
        $optional = [
            'description',
            'artifactLocation',
            'regions',
            'rectangles',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
