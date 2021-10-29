<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ToolComponent;

/**
 * @author Laurent Laville
 */
trait Extensions
{
    /**
     * Tool extensions that contributed to or reconfigured the analysis tool that was run.
     * @var ToolComponent[]
     */
    protected $extensions;

    /**
     * @param ToolComponent[] $extensions
     */
    public function addExtensions(array $extensions): void
    {
        foreach ($extensions as $extension) {
            if ($extension instanceof ToolComponent) {
                $this->extensions[] = $extension;
            }
        }
    }
}
