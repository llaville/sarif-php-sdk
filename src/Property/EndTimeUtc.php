<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

/**
 * The Coordinated Universal Time (UTC) date and time at which the invocation ended.
 * See "Date/time properties" in the SARIF spec for the required format.
 *
 * @author Laurent Laville
 */
trait EndTimeUtc
{
    /**
     * @var string format date-time
     */
    protected $endTimeUtc;

    /**
     * @param string $endTimeUtc
     */
    public function setEndTimeUtc(string $endTimeUtc): void
    {
        $this->endTimeUtc = $endTimeUtc;
    }
}
