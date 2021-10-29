<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Result;

/**
 * @author Laurent Laville
 */
trait Results
{
    /**
     * @var Result[]
     */
    protected $results;

    /**
     * @param Result[] $results
     */
    public function addResults(array $results): void
    {
        foreach ($results as $result) {
            if ($result instanceof Result) {
                $this->results[] = $result;
            }
        }
    }
}
