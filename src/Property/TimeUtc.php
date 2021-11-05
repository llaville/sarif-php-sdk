<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * @author Laurent Laville
 */
trait TimeUtc
{
    /**
     * @var string format date-time
     */
    protected $timeUtc;

    /**
     * @param string $timeUtc
     */
    public function setTimeUtc(string $timeUtc): void
    {
        $this->timeUtc = $timeUtc;
    }
}
