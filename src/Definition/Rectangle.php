<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Bottom;
use Bartlett\Sarif\Property\Left;
use Bartlett\Sarif\Property\MessageString;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\Right;
use Bartlett\Sarif\Property\Top;

/**
 * An area within an image.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317701
 * @author Laurent Laville
 */
final class Rectangle extends JsonSerializable
{
    /**
     * The Y coordinate of the top edge of the rectangle, measured in the image's natural units.
     */
    use Top;

    /**
     * The X coordinate of the left edge of the rectangle, measured in the image's natural units.
     */
    use Left;

    /**
     * The Y coordinate of the bottom edge of the rectangle, measured in the image's natural units.
     */
    use Bottom;

    /**
     * The X coordinate of the right edge of the rectangle, measured in the image's natural units.
     */
    use Right;

    /**
     * A message relevant to the rectangle.
     */
    use MessageString;

    /**
     * Key/value pairs that provide additional information about the rectangle.
     */
    use Properties;

    public function __construct()
    {
        $this->required = [];
        $this->optional = [
            'top',
            'left',
            'bottom',
            'right',
            'message',
            'properties',
        ];
    }
}
