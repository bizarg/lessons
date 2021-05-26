<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Room\DeleteRoom\DeleteRoom;
use App\Application\Room\GetRoomList\GetRoomList;
use App\Application\Room\StoreRoom\StoreRoom;
use App\Application\Room\UpdateRoom\UpdateRoom;
use App\Domain\Room\Room;
use App\Http\Requests\Room\ListRoomRequest;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Http\Resources\Room\RoomResource;
use App\Http\Resources\Room\RoomResourceCollection;
use App\Domain\Room\RoomFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class RoomController
 * @package App\Http\Controllers\Api
 */
class RoomController extends Controller
{
    /**
     * @param ListRoomRequest $request
     * @return JsonResponse
     */
    public function index(ListRoomRequest $request): JsonResponse
    {
        $order = Order::fromRequest($request, Room::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);
        $filter = RoomFilter::fromRequest($request);

        $rooms = $this->dispatchCommand(new GetRoomList($filter, $pagination, $order));

        return new JsonResponse(
            new RoomResourceCollection($rooms)
        );
    }

    /**
     * @param StoreRoomRequest $request
     * @return JsonResponse
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $room = $this->dispatchCommand(StoreRoom::fromRequest($request));

        return new JsonResponse([
            'data' => new RoomResource($room)
        ], Response::HTTP_CREATED);
    }

    /**
     * @param UpdateRoomRequest $request
     * @param Room $room
     * @return JsonResponse
     */
    public function update(UpdateRoomRequest $request, Room $room): JsonResponse
    {
        $room = $this->dispatchCommand(UpdateRoom::fromRequest($request, $room));

        return new JsonResponse([
            'data' => new RoomResource($room)
        ]);
    }

    /**
     * @param Room $room
     * @return JsonResponse
     */
    public function show(Room $room): JsonResponse
    {
        return new JsonResponse([
            'data' => new RoomResource($room)
        ]);
    }

    /**
     * @param Room $room
     * @return JsonResponse
     */
    public function destroy(Room $room): JsonResponse
    {
        $this->dispatchCommand(new DeleteRoom($room));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
