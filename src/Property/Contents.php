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
 * @since Release 1.0.0
 */
trait Contents
{
    /**
     * @var string[]
     */
    protected array $contents;

    /**
     * @param string[] $contents
     */
    public function setContents(array $contents): void
    {
        // FIXME -- enum values : localizedData, nonLocalizedData
        $this->contents = $contents;
    }
}
