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
 * @since Release 1.0.0
 */
trait Fingerprints
{
    /**
     * @var string[]
     */
    protected array $fingerprints;

    /**
     * @param string[] $fingerprints
     * @see http://json-schema.org/understanding-json-schema/reference/object.html#additional-properties
     */
    public function addFingerprints(array $fingerprints): void
    {
        foreach ($fingerprints as $key => $fingerprint) {
            if (is_string($key) && is_string($fingerprint)) {
                $this->fingerprints[$key] = $fingerprint;
            }
        }
    }
}
