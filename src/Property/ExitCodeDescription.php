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
trait ExitCodeDescription
{
    /**
     * @var string
     */
    protected $exitCodeDescription;

    /**
     * @param string $exitCodeDescription
     */
    public function setExitCodeDescription(string $exitCodeDescription): void
    {
        $this->exitCodeDescription = $exitCodeDescription;
    }
}
