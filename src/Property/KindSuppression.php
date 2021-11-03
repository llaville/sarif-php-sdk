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
 */
trait KindSuppression
{
    /**
     * @var string
     */
    protected $kind;

    /**
     * @param string $kind
     */
    public function setKind(string $kind): void
    {
        $enum = ['inSource', 'external'];
        if (!in_array($kind, $enum)) {
            throw new DomainException($kind . ' "kind" is not allowed.');
        }
        $this->kind = $kind;
    }
}
