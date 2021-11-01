<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ReportingDescriptorRelationship;

/**
 * @author Laurent Laville
 */
trait Relationships
{
    /**
     * @var ReportingDescriptorRelationship[]
     */
    protected $relationships;

    /**
     * @param ReportingDescriptorRelationship[] $relationships
     */
    public function addRelationships(array $relationships): void
    {
        foreach ($relationships as $relationship) {
            if ($relationship instanceof ReportingDescriptorRelationship) {
                $this->relationships[] = $relationship;
            }
        }
    }
}
