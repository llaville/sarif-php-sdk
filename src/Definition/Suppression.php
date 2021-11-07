<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Definition;

use Bartlett\Sarif\Internal\JsonSerializable;
use Bartlett\Sarif\Property\Guid;
use Bartlett\Sarif\Property\Justification;
use Bartlett\Sarif\Property\KindSuppression;
use Bartlett\Sarif\Property\LocationSuppression;
use Bartlett\Sarif\Property\Properties;
use Bartlett\Sarif\Property\StatusSuppression;

/**
 * A suppression that is relevant to a result.
 *
 * @link https://docs.oasis-open.org/sarif/sarif/v2.1.0/os/sarif-v2.1.0-os.html#_Toc34317733
 * @author Laurent Laville
 */
final class Suppression extends JsonSerializable
{
    /**
     * A stable, unique identifier for the suppression in the form of a GUID.
     */
    use Guid;

    /**
     * A string that indicates where the suppression is persisted.
     */
    use KindSuppression;

    /**
     * A string that indicates the review status of the suppression.
     */
    use StatusSuppression;

    /**
     * A string representing the justification for the suppression.
     */
    use Justification;

    /**
     * Identifies the location associated with the suppression.
     */
    use LocationSuppression;

    /**
     * Key/value pairs that provide additional information about the suppression.
     */
    use Properties;

    public function __construct(string $kind)
    {
        $this->kind = $kind;

        $this->required = ['kind'];
        $this->optional = [
            'guid',
            'status',
            'justification',
            'location',
            'properties',
        ];
    }
}
