<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ExternalProperties;

/**
 * @author Laurent Laville
 */
trait InlineExternalProperties
{
    /**
     * @var ExternalProperties[]
     */
    protected $inlineExternalProperties;

    /**
     * @param ExternalProperties[] $items
     */
    public function addInlineExternalProperties(array $items): void
    {
        foreach ($items as $item) {
            if ($item instanceof ExternalProperties) {
                $this->inlineExternalProperties[] = $item;
            }
        }
    }
}
