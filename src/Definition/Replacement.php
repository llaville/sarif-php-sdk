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
 * The replacement of a single region of an artifact.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317889
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Replacement extends JsonSerializable
{
    /**
     * The region of the artifact to delete.
     */
    use Property\DeletedRegion;

    /**
     * The content to insert at the location specified by the 'deletedRegion' property.
     */
    use Property\InsertedContent;

    /**
     * Key/value pairs that provide additional information about the replacement.
     */
    use Property\Properties;

    public function __construct()
    {
        $required = ['deletedRegion'];
        $optional = [
            'insertedContent',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
