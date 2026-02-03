<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use DomainException;
use function in_array;

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
        $enum = ["localizedData", "nonLocalizedData"];

        foreach ($contents as $content) {
            if (!in_array($content, $enum, true)) {
                throw new DomainException($content . ' "contents" is not allowed.');
            }
        }

        $this->contents = $contents;
    }
}
