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
 * A suppression that is relevant to a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317733
 * @author Laurent Laville
 * @since Release 1.0.0
 */
final class Suppression extends JsonSerializable
{
    /**
     * A stable, unique identifier for the suppression in the form of a GUID.
     */
    use Property\Guid;

    /**
     * A string that indicates where the suppression is persisted.
     */
    use Property\KindSuppression;

    /**
     * A string that indicates the review status of the suppression.
     */
    use Property\StatusSuppression;

    /**
     * A string representing the justification for the suppression.
     */
    use Property\Justification;

    /**
     * Identifies the location associated with the suppression.
     */
    use Property\LocationSuppression;

    /**
     * Key/value pairs that provide additional information about the suppression.
     */
    use Property\Properties;

    public function __construct(string $kind)
    {
        $this->kind = $kind;

        $required = ['kind'];
        $optional = [
            'guid',
            'status',
            'justification',
            'location',
            'properties',
        ];
        parent::__construct($required, $optional);
    }
}
