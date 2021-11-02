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
trait PartialFingerprints
{
    /**
     * @var string[]
     */
    protected $partialFingerprints;

    /**
     * @param string[] $partialFingerprints
     * @see http://json-schema.org/understanding-json-schema/reference/object.html#additional-properties
     */
    public function addPartialFingerprints(array $partialFingerprints): void
    {
        foreach ($partialFingerprints as $key => $partialFingerprint) {
            if (is_string($key) && is_string($partialFingerprint)) {
                $this->partialFingerprints[$key] = $partialFingerprint;
            }
        }
    }
}
