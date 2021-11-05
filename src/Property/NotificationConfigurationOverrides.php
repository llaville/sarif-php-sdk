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
 * An array of configurationOverride objects that describe notifications related runtime overrides.
 *
 * @author Laurent Laville
 */
trait NotificationConfigurationOverrides
{
    /**
     * @var ConfigurationOverride[]
     */
    protected $notificationConfigurationOverrides;

    /**
     * @param ConfigurationOverride[] $notificationConfigurationOverrides
     */
    public function addNotificationConfigurationOverrides(array $notificationConfigurationOverrides): void
    {
        foreach ($notificationConfigurationOverrides as $notificationConfigurationOverride) {
            if ($notificationConfigurationOverride instanceof ConfigurationOverride) {
                $this->notificationConfigurationOverrides[] = $notificationConfigurationOverride;
            }
        }
    }
}
