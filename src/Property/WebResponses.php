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
trait WebResponses
{
    /**
     * @var WebResponse[];
     */
    protected $webResponses;

    /**
     * @param WebResponse[] $webResponses
     */
    public function addWebResponses(array $webResponses): void
    {
        foreach ($webResponses as $webResponse) {
            if ($webResponse instanceof WebResponse) {
                $this->webResponses[] = $webResponse;
            }
        }
    }
}
