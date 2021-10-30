<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Description;
use Bartlett\Sarif\Property\LocationAttachment;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Rectangles;
use Bartlett\Sarif\Property\Regions;

/**
 * An artifact relevant to a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317591
 * @author Laurent Laville
 */
final class Attachment extends JsonSerializable
{
    /**
     * A message describing the role played by the attachment.
     */
    use Description;

    /**
     * The location of the attachment.
     */
    use LocationAttachment;

    /**
     * An array of regions of interest within the attachment.
     */
    use Regions;

    /**
     * An array of rectangles specifying areas of interest within the image.
     */
    use Rectangles;

    /**
     * Key/value pairs that provide additional information about the attachment.
     */
    use Properties;

    public function __construct()
    {
        $this->required = ['artifactLocation'];
        $this->optional = [
            'description',
            'artifactLocation',
            'regions',
            'rectangles',
            'properties',
        ];
    }
}
