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
use Bartlett\Sarif\Property\Kinds;
use Bartlett\Sarif\Property\Properties;

/**
 * Information about the relation of one location to another.
 *
 * @author Laurent Laville
 */
final class LocationRelationship extends JsonSerializable
{
    /**
     * A reference to the related location.
     * @var int
     */
    protected $target;

    /**
     * A set of distinct strings that categorize the relationship.
     * Well-known kinds include 'includes', 'isIncludedBy' and 'relevant'.
     */
    use Kinds;

    /**
     * A description of the location relationship.
     */
    use Description;

    /**
     * Key/value pairs that provide additional information about the location relationship.
     */
    use Properties;

    /**
     * @param int $target
     */
    public function __construct(int $target)
    {
        $this->target = $target;

        $this->required = ['target'];
        $this->optional =[
            'kinds',
            'description',
            'properties',
        ];
    }
}