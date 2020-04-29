<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class UserResourceCollection
 * @package App\Http\Resources\User
 */
class UserResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return UserResource
     */
    protected function getItemData($item): UserResource
    {
        return new UserResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
