<?php

namespace App\Http\Controllers;

use App\Application\Notification\GetNotificationList\GetNotificationList;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationFilter;
use App\Http\Resources\Notification\NotificationResourceCollection;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class NotificationController
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|JsonResponse|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filter = NotificationFilter::fromRequest($request);
            $order = Order::fromRequest($request, Notification::ALLOWED_SORT_FIELDS);
            $pagination = Pagination::fromRequest($request);

            $notifications = $this->dispatchCommand(new GetNotificationList($filter, $pagination, $order));

            return response()->json(new NotificationResourceCollection($notifications), Response::HTTP_OK);
        }

        return view('web.notification.index');
    }
}
