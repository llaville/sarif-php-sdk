<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\CodeFlow;

/**
 * @author Laurent Laville
 */
trait CodeFlows
{
    /**
     * @var CodeFlow[]
     */
    protected $codeFlows;

    /**
     * @param CodeFlow[] $codeFlows
     */
    public function addCodeFlows(array $codeFlows): void
    {
        foreach ($codeFlows as $codeFlow) {
            if ($codeFlow instanceof CodeFlow) {
                $this->codeFlows[] = $codeFlow;
            }
        }
    }
}
