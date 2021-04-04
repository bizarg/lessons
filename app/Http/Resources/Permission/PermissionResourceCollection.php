<?php

declare(strict_types=1);

namespace App\Http\Resources\Permission;

use App\Http\Resources\ResourceCollectionWithStandardResponse;

/**
 * Class PermissionResourceCollection
 * @package App\Http\Resources\Permission
 */
class PermissionResourceCollection extends ResourceCollectionWithStandardResponse
{
    /**
     * @param object $item
     * @return PermissionResource
     */
    protected function getItemData($item): PermissionResource
    {
        return new PermissionResource($item);
    }

    /**
     * @return null|string
     */
    protected function getLinksHelperRouteName()
    {
        return null;
    }
}
