<?php declare(strict_types=1);
/**
 * This file is part of the Sarif-PHP-SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bartlett\Sarif\Property;

use Bartlett\Sarif\Definition\Notification;

/**
 * @author Laurent Laville
 */
trait ToolExecutionNotifications
{
    /**
     * @var Notification[]
     */
    protected $toolExecutionNotifications;

    /**
     * @param Notification[] $toolExecutionNotifications
     */
    public function addToolExecutionNotifications(array $toolExecutionNotifications): void
    {
        foreach ($toolExecutionNotifications as $toolExecutionNotification) {
            if ($toolExecutionNotification instanceof Notification) {
                $this->toolExecutionNotifications[] = $toolExecutionNotification;
            }
        }
    }
}
