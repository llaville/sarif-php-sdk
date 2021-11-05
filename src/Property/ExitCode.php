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
trait ExitCode
{
    /**
     * @var int
     */
    protected $exitCode;

    /**
     * @param int $exitCode
     */
    public function setExitCode(int $exitCode): void
    {
        $this->exitCode = $exitCode;
    }
}
