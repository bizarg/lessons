<?php

declare(strict_types=1);

namespace App\Application\Room\StoreRoom;

use App\Domain\Room\Room;
use App\Domain\Room\RoomRepository;
use Exception;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;
use Ramsey\Uuid\Uuid;

/**
 * Class StoreRoomHandler
 * @package App\Application\Room
 */
class StoreRoomHandler implements Handler
{
    /**
     * @var RoomRepository
     */
    private RoomRepository $roomRepository;

    /**
     * StoreRoomHandler constructor.
     * @param RoomRepository $roomRepository
     */
    public function __construct(
        RoomRepository $roomRepository
    ) {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @param Command|StoreRoom $command
     * @return Room
     * @throws Exception
     */
    public function handle(Command $command): Room
    {
        $room = Room::register(
            $command->title(),
            $command->user()->id,
            Uuid::fromDateTime(now())->toString()
        );

        $this->roomRepository->store($room);

        $room->members()->attach($command->user());

        return $room;
    }
}
