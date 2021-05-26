<?php

declare(strict_types=1);

namespace App\Http\Resources\Room;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class RoomResourceCollection
 * @package App\Http\Resources\Room
 */
class RoomResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return RoomResource
     */
    protected function getItemData($item): RoomResource
    {
        return new RoomResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
