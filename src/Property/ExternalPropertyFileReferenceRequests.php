<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ExternalPropertyFileReference;

/**
 * @author Laurent Laville
 * @since Release 1.0.0
 */
trait ExternalPropertyFileReferenceRequests
{
    /**
     * @var ExternalPropertyFileReference[]
     */
    protected array $webRequests;

    /**
     * @param ExternalPropertyFileReference[] $webRequests
     */
    public function addWebRequests(array $webRequests): void
    {
        foreach ($webRequests as $webRequest) {
            if ($webRequest instanceof ExternalPropertyFileReference) {
                $this->webRequests[] = $webRequest;
            }
        }
    }
}
