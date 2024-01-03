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
 * @since Release 1.0.0
 */
trait InnerExceptions
{
    /**
     * @var Exception[]
     */
    protected array $innerExceptions;

    /**
     * @param Exception[] $innerExceptions
     */
    public function addInnerExceptions(array $innerExceptions): void
    {
        foreach ($innerExceptions as $innerException) {
            if ($innerException instanceof Exception) {
                $this->innerExceptions[] = $innerException;
            }
        }
    }
}
