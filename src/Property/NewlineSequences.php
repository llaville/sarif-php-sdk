<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use function is_string;

/**
 * @author Laurent Laville
 */
trait NewlineSequences
{
    /**
     * @var string[]
     */
    protected $newlineSequences;

    /**
     * @param string[] $newlineSequences
     */
    public function addNewlineSequences(array $newlineSequences = ["\r\n", "\n"]): void
    {
        foreach ($newlineSequences as $newlineSequence) {
            if (is_string($newlineSequence)) {
                $this->newlineSequences[] = $newlineSequence;
            }
        }
    }
}
