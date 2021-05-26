<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Message\DeleteMessage\DeleteMessage;
use App\Application\Message\GetMessageList\GetMessageList;
use App\Application\Message\StoreMessage\StoreMessage;
use App\Application\Message\UpdateMessage\UpdateMessage;
use App\Domain\Message\Message;
use App\Http\Requests\Message\ListMessageRequest;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessageResourceCollection;
use App\Domain\Message\MessageFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class MessageController
 * @package App\Http\Controllers\Api
 */
class MessageController extends Controller
{
    /**
     * @param ListMessageRequest $request
     * @return JsonResponse
     */
    public function index(ListMessageRequest $request): JsonResponse
    {
        $order = Order::fromRequest($request, Message::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);
        $filter = MessageFilter::fromRequest($request);

        $messages = $this->dispatchCommand(new GetMessageList($filter, $pagination, $order));

        return new JsonResponse(
            new MessageResourceCollection($messages)
        );
    }

    /**
     * @param StoreMessageRequest $request
     * @return JsonResponse
     */
    public function store(StoreMessageRequest $request): JsonResponse
    {
        $message = $this->dispatchCommand(StoreMessage::fromRequest($request));

        return new JsonResponse([
            'data' => new MessageResource($message)
        ], Response::HTTP_CREATED);
    }

    /**
     * @param UpdateMessageRequest $request
     * @param Message $message
     * @return JsonResponse
     */
    public function update(UpdateMessageRequest $request, Message $message): JsonResponse
    {
        $message = $this->dispatchCommand(UpdateMessage::fromRequest($request, $message));

        return new JsonResponse([
            'data' => new MessageResource($message)
        ]);
    }

    /**
     * @param Message $message
     * @return JsonResponse
     */
    public function show(Message $message): JsonResponse
    {
        return new JsonResponse([
            'data' => new MessageResource($message)
        ]);
    }

    /**
     * @param Message $message
     * @return JsonResponse
     */
    public function destroy(Message $message): JsonResponse
    {
        $this->dispatchCommand(new DeleteMessage($message));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
