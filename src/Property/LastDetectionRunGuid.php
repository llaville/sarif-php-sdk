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
trait LastDetectionRunGuid
{
    protected string $lastDetectionRunGuid;

    public function setLastDetectionRunGuid(string $lastDetectionRunGuid): void
    {
        $pattern = "^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$";
        if (preg_match_all("/$pattern/", $lastDetectionRunGuid) === false) {
            throw new DomainException('"lastDetectionRunGuid" does not satisfy pattern "' . $pattern . '"');
        }
        $this->lastDetectionRunGuid = $lastDetectionRunGuid;
    }
}
