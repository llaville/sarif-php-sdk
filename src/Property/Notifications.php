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
trait Notifications
{
    /**
     * @var ReportingDescriptor[]
     */
    protected $notifications;

    /**
     * @param ReportingDescriptor[] $notifications
     */
    public function addNotifications(array $notifications): void
    {
        foreach ($notifications as $notification) {
            if ($notification instanceof ReportingDescriptor) {
                $this->notifications[] = $notification;
            }
        }
    }
}
