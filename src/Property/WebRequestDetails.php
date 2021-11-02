<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\WebRequest;

/**
 * @author Laurent Laville
 */
trait WebRequestDetails
{
    /**
     * @var WebRequest
     */
    protected $webRequest;

    /**
     * @param WebRequest $webRequest
     */
    public function setWebRequest(WebRequest $webRequest): void
    {
        $this->webRequest = $webRequest;
    }
}
