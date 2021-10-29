<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Address;

/**
 * @author Laurent Laville
 */
trait Addresses
{
    /**
     * @var Address[]
     */
    protected $addresses;

    /**
     * @param Address[] $addresses
     */
    public function addAddresses(array $addresses): void
    {
        foreach ($addresses as $address) {
            if ($address instanceof Address) {
                $this->addresses[] = $address;
            }
        }
    }
}
