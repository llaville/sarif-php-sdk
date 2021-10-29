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
trait ReleaseDateUtc
{
    /**
     * @var string
     */
    protected $releaseDateUtc;

    /**
     * @param string $releaseDateUtc
     */
    public function setReleaseDateUtc(string $releaseDateUtc): void
    {
        $this->releaseDateUtc = $releaseDateUtc;
    }
}
