<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Notification\DeleteNotification\DeleteNotification;
use App\Application\Notification\GetNotificationList\GetNotificationList;
use App\Application\Notification\RegisterNotification\RegisterNotification;
use App\Application\Notification\UpdateNotification\UpdateNotification;
use App\Domain\Notification\Notification;
use App\Http\Requests\Notification\NotificationRequest;
use App\Http\Requests\Notification\NotificationIndexRequest;
use App\Http\Resources\Notification\NotificationResource;
use App\Http\Resources\Notification\NotificationResourceCollection;
use App\Domain\Notification\NotificationFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class NotificationController
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    /**
     * @param NotificationIndexRequest $request
     * @return JsonResponse
     */
    public function index(NotificationIndexRequest $request): JsonResponse
    {
        $filter = NotificationFilter::fromRequest($request);
        $order = Order::fromRequest($request, Notification::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);

        $notifications = $this->dispatchCommand(new GetNotificationList($filter, $pagination, $order));

        return response()->json(new NotificationResourceCollection($notifications), Response::HTTP_OK);
    }

    /**
     * @param NotificationRequest $request
     * @return JsonResponse
     */
    public function store(NotificationRequest $request): JsonResponse
    {
        $notification = $this->dispatchCommand(RegisterNotification::fromRequest($request));

        return response()->json(['data' => new NotificationResource($notification)], Response::HTTP_CREATED);
    }

    /**
     * @param NotificationRequest $request
     * @param Notification $notification
     * @return JsonResponse
     */
    public function update(NotificationRequest $request, Notification $notification): JsonResponse
    {
        $notification = $this->dispatchCommand(UpdateNotification::fromRequest($request, $notification));

        return response()->json([
            'data' => new NotificationResource($notification)
        ], Response::HTTP_OK);
    }

	/**
     * @param Notification $notification
     * @return JsonResponse
     */
    public function show(Notification $notification): JsonResponse
    {
        return response()->json(['data' => new NotificationResource($notification)]);
    }

    /**
     * @param Notification $notification
     * @return JsonResponse
     */
    public function destroy(Notification $notification): JsonResponse
    {
        $this->dispatchCommand(new DeleteNotification($notification));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
