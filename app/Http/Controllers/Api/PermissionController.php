<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Permission\DeletePermission\DeletePermission;
use App\Application\Permission\GetPermissionList\GetPermissionList;
use App\Application\Permission\StorePermission\StorePermission;
use App\Application\Permission\UpdatePermission\UpdatePermission;
use App\Domain\Permission\Permission;
use App\Http\Requests\Permission\ListPermissionRequest;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Http\Resources\Permission\PermissionResource;
use App\Http\Resources\Permission\PermissionResourceCollection;
use App\Domain\Permission\PermissionFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Api
 */
class PermissionController extends Controller
{
    /**
     * @param ListPermissionRequest $request
     * @return JsonResponse
     */
    public function index(ListPermissionRequest $request): JsonResponse
    {
        $order = Order::fromRequest($request, Permission::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);
        $filter = PermissionFilter::fromRequest($request);

        $permissions = $this->dispatchCommand(new GetPermissionList($filter, $pagination, $order));

        return new JsonResponse(
            new PermissionResourceCollection($permissions)
        );
    }

    /**
     * @param StorePermissionRequest $request
     * @return JsonResponse
     */
    public function store(StorePermissionRequest $request): JsonResponse
    {
        $permission = $this->dispatchCommand(StorePermission::fromRequest($request));

        return new JsonResponse([
            'data' => new PermissionResource($permission)
        ], Response::HTTP_CREATED);
    }

    /**
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return JsonResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): JsonResponse
    {
        $permission = $this->dispatchCommand(UpdatePermission::fromRequest($request, $permission));

        return new JsonResponse([
            'data' => new PermissionResource($permission)
        ]);
    }

    /**
     * @param Permission $permission
     * @return JsonResponse
     */
    public function show(Permission $permission): JsonResponse
    {
        return new JsonResponse([
            'data' => new PermissionResource($permission)
        ]);
    }

    /**
     * @param Permission $permission
     * @return JsonResponse
     */
    public function destroy(Permission $permission): JsonResponse
    {
        $this->dispatchCommand(new DeletePermission($permission));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
