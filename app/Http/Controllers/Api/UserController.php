<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\User\DeleteUser\DeleteUser;
use App\Application\User\GetUserList\GetUserList;
use App\Application\User\RegisterUser\RegisterUser;
use App\Application\User\UpdateUser\UpdateUser;
use App\Domain\User\User;
use App\Http\Requests\User\UserIndexRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use App\Domain\User\UserFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param UserIndexRequest $request
     * @return JsonResponse
     */
    public function index(UserIndexRequest $request): JsonResponse
    {
        $filter = UserFilter::fromRequest($request);
        $order = Order::fromRequest($request, User::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);

        $users = $this->dispatchCommand(new GetUserList($filter, $pagination, $order));

        return response()->json(new UserResourceCollection($users), Response::HTTP_OK);
    }

    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->dispatch(RegisterUser::fromRequest($request));

        return response()->json(['data' => new UserResource($user)], Response::HTTP_CREATED);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        $user = $this->dispatch(UpdateUser::fromRequest($request, $user));

        return response()->json([
            'data' => new UserResource($user)
        ], Response::HTTP_OK);
    }

	/**
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json(['data' => new UserResource($user)]);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $this->dispatch(new DeleteUser($user));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
