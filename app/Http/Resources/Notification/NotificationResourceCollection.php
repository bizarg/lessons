<?php

declare(strict_types=1);

namespace App\Http\Resources\Notification;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class NotificationResourceCollection
 * @package App\Http\Resources\Notification
 */
class NotificationResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return NotificationResource
     */
    protected function getItemData($item): NotificationResource
    {
        return new NotificationResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return 'notifications.index';
    }
}
