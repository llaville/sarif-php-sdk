<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use function is_string;

/**
 * @author Laurent Laville
 */
trait WorkItemUris
{
    /**
     * @var string[] format uri
     */
    protected $workItemUris;

    /**
     * @param string[] $workItemUris
     */
    public function setWorkItemUris(array $workItemUris): void
    {
        foreach ($workItemUris as $workItemUri) {
            if (is_string($workItemUri)) {
                $this->workItemUris[] = $workItemUri;
            }
        }
    }
}
