<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use DomainException;
use function preg_match_all;

/**
 * @author Laurent Laville
 */
trait MimeType
{
    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @param string $mimeType
     */
    public function setMimeType(string $mimeType): void
    {
        $pattern = "[^/]+/.+";
        if (preg_match_all("`$pattern`", $mimeType) === false) {
            throw new DomainException('"mimeType" does not satisfy pattern "' . $pattern . '"');
        }
        $this->mimeType = $mimeType;
    }
}
