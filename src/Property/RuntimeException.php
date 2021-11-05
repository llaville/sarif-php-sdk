<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Exception;

/**
 * @author Laurent Laville
 */
trait RuntimeException
{
    /**
     * @var Exception
     */
    protected $exception;

    /**
     * @param Exception $exception
     */
    public function setRuntimeException(Exception $exception): void
    {
        $this->exception = $exception;
    }
}
