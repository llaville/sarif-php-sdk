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
trait Roles
{
    /**
     * @var string[]
     */
    protected $roles;

    /**
     * @param string[] $roles
     */
    public function addRoles(array $roles): void
    {
        $rolesAllowed = [
            "analysisTarget",
            "attachment",
            "responseFile",
            "resultFile",
            "standardStream",
            "tracedFile",
            "unmodified",
            "modified",
            "added",
            "deleted",
            "renamed",
            "uncontrolled",
            "driver",
            "extension",
            "translation",
            "taxonomy",
            "policy",
            "referencedOnCommandLine",
            "memoryContents",
            "directory",
            "userSpecifiedConfiguration",
            "toolSpecifiedConfiguration",
            "debugOutputFile"
        ];

        foreach ($roles as $role) {
            if (!in_array($role, $rolesAllowed)) {
                throw new DomainException($role . ' "role" is not allowed.');
            }
            $this->roles[] = $role;
        }
    }
}
