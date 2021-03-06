<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Application\User\DeleteUser\DeleteUser;
use App\Application\User\GetUserList\GetUserList;
use App\Application\User\RegisterUser\RegisterUser;
use App\Application\User\UpdateUser\UpdateUser;
use App\Domain\User\User;
use App\Http\Requests\User\UserRequest;
use App\Domain\User\UserFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
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
        $user = $this->dispatchCommand(RegisterUser::fromRequest($request));

        return response()->json(['data' => new UserResource($user)], Response::HTTP_CREATED);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        $user = $this->dispatchCommand(UpdateUser::fromRequest($request, $user));

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
        $this->dispatchCommand(new DeleteUser($user));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
