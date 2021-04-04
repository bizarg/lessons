<?php

declare(strict_types=1);

namespace App\Http\Resources\Role;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class RoleResourceCollection
 * @package App\Http\Resources\Role
 */
class RoleResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return RoleResource
     */
    protected function getItemData($item): RoleResource
    {
        return new RoleResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
