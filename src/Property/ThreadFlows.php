<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ThreadFlow;

/**
 * @author Laurent Laville
 */
trait ThreadFlows
{
    /**
     * @var ThreadFlow[]
     */
    protected $threadFlows;

    /**
     * @param ThreadFlow[] $threadFlows
     */
    public function addThreadFlows(array $threadFlows): void
    {
        foreach ($threadFlows as $threadFlow) {
            if ($threadFlow instanceof ThreadFlow) {
                $this->threadFlows[] = $threadFlow;
            }
        }
    }
}
