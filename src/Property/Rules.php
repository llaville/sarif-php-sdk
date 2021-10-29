<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ReportingDescriptor;

/**
 * @author Laurent Laville
 */
trait Rules
{
    /**
     * An array of reportingDescriptor objects relevant to the analysis performed by the tool component.
     * @var ReportingDescriptor[]
     */
    protected $rules;

    /**
     * @param ReportingDescriptor[] $rules
     */
    public function addRules(array $rules): void
    {
        foreach ($rules as $rule) {
            if ($rule instanceof ReportingDescriptor) {
                $this->rules[] = $rule;
            }
        }
    }
}
