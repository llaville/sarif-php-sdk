<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Run;

/**
 * @author Laurent Laville
 */
trait Runs
{
    /**
     * @var Run[]
     */
    protected $runs;

    /**
     * @param Run $run
     */
    public function addRun(Run $run): void
    {
        $this->runs[] = $run;
    }
}
