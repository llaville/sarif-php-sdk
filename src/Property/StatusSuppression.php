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
trait StatusSuppression
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $enum = ['accepted', 'underReview', 'rejected'];
        if (!in_array($status, $enum)) {
            throw new DomainException($status . ' "status" is not allowed.');
        }
        $this->status = $status;
    }
}
