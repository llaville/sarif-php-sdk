<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\DeletedRegion;
use Bartlett\Sarif\Property\InsertedContent;
use Bartlett\Sarif\Property\Properties;

/**
 * The replacement of a single region of an artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317889
 * @author Laurent Laville
 */
final class Replacement extends JsonSerializable
{
    /**
     * The region of the artifact to delete.
     */
    use DeletedRegion;

    /**
     * The content to insert at the location specified by the 'deletedRegion' property.
     */
    use InsertedContent;

    /**
     * Key/value pairs that provide additional information about the replacement.
     */
    use Properties;

    /**
     * @param Region $deletedRegion
     */
    public function __construct(Region $deletedRegion)
    {
        $this->deletedRegion = $deletedRegion;

        $this->required = ['deletedRegion'];
        $this->optional = [
            'insertedContent',
            'properties',
        ];
    }
}
