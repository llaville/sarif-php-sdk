<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\LocationRelationship;

/**
 * @author Laurent Laville
 */
trait LocationRelationships
{
    /**
     * @var LocationRelationship[]
     */
    protected $relationships;

    /**
     * @param LocationRelationship[] $relationships
     */
    public function addRelationships(array $relationships): void
    {
        foreach ($relationships as $relationship) {
            if ($relationship instanceof LocationRelationship) {
                $this->relationships[] = $relationship;
            }
        }
    }
}
