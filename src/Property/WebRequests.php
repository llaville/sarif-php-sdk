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
trait WebRequests
{
    /**
     * @var WebRequest[];
     */
    protected $webRequests;

    /**
     * @param WebRequest[] $webRequests
     */
    public function addWebRequests(array $webRequests): void
    {
        foreach ($webRequests as $webRequest) {
            if ($webRequest instanceof WebRequest) {
                $this->webRequests[] = $webRequest;
            }
        }
    }
}
