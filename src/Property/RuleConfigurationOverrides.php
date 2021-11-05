<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\ConfigurationOverride;

/**
 * @author Laurent Laville
 */
trait RuleConfigurationOverrides
{
    /**
     * @var ConfigurationOverride[]
     */
    protected $ruleConfigurationOverrides;

    /**
     * @param ConfigurationOverride[] $ruleConfigurationOverrides
     */
    public function addRuleConfigurationOverrides(array $ruleConfigurationOverrides): void
    {
        foreach ($ruleConfigurationOverrides as $ruleConfigurationOverride) {
            if ($ruleConfigurationOverride instanceof ConfigurationOverride) {
                $this->ruleConfigurationOverrides[] = $ruleConfigurationOverride;
            }
        }
    }
}
