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
 * @since Release 1.0.0
 */
trait DottedQuadFileVersion
{
    protected string $dottedQuadFileVersion;

    public function setDottedQuadFileVersion(string $dottedQuadFileVersion): void
    {
        $pattern = "[0-9]+(\\.[0-9]+){3}";
        if (preg_match_all("/$pattern/", $dottedQuadFileVersion) === false) {
            throw new DomainException('"dottedQuadFileVersion" does not satisfy pattern "' . $pattern . '"');
        }
        $this->dottedQuadFileVersion = $dottedQuadFileVersion;
    }
}
