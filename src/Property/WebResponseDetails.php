<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\WebResponse;

/**
 * @author Laurent Laville
 */
trait WebResponseDetails
{
    /**
     * @var WebResponse
     */
    protected $webResponse;

    /**
     * @param WebResponse $webResponse
     */
    public function setWebResponse(WebResponse $webResponse): void
    {
        $this->webResponse = $webResponse;
    }
}
