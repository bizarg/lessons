<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Role\DeleteRole\DeleteRole;
use App\Application\Role\GetRoleList\GetRoleList;
use App\Application\Role\StoreRole\StoreRole;
use App\Application\Role\UpdateRole\UpdateRole;
use App\Domain\Role\Role;
use App\Http\Requests\Role\ListRoleRequest;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\Role\RoleResourceCollection;
use App\Domain\Role\RoleFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class RoleController
 * @package App\Http\Controllers\Api
 */
class RoleController extends Controller
{
    /**
     * @param ListRoleRequest $request
     * @return JsonResponse
     */
    public function index(ListRoleRequest $request): JsonResponse
    {
        $order = Order::fromRequest($request, Role::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);
        $filter = RoleFilter::fromRequest($request);

        $roles = $this->dispatchCommand(new GetRoleList($filter, $pagination, $order));

        return new JsonResponse(
            new RoleResourceCollection($roles)
        );
    }

    /**
     * @param StoreRoleRequest $request
     * @return JsonResponse
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        $role = $this->dispatchCommand(StoreRole::fromRequest($request));

        return new JsonResponse([
            'data' => new RoleResource($role)
        ], Response::HTTP_CREATED);
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return JsonResponse
     */
    public function update(UpdateRoleRequest $request, Role $role): JsonResponse
    {
        $role = $this->dispatchCommand(UpdateRole::fromRequest($request, $role));

        return new JsonResponse([
            'data' => new RoleResource($role)
        ]);
    }

    /**
     * @param Role $role
     * @return JsonResponse
     */
    public function show(Role $role): JsonResponse
    {
        return new JsonResponse([
            'data' => new RoleResource($role)
        ]);
    }

    /**
     * @param Role $role
     * @return JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        $this->dispatchCommand(new DeleteRole($role));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
