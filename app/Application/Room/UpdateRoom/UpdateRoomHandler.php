<?php

declare(strict_types=1);

namespace App\Application\Room\UpdateRoom;

use App\Domain\Room\Room;
use App\Domain\Room\RoomRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateRoomHandler
 * @package App\Application\Room\UpdateRoom
 */
class UpdateRoomHandler implements Handler
{
    /**
     * @var RoomRepository
     */
    private RoomRepository $roomRepository;

    /**
     * UpdateRoomHandler constructor.
     * @param RoomRepository $roomRepository
     */
    public function __construct(
        RoomRepository $roomRepository
    ) {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @param Command|UpdateRoom $command
     * @return Room
     */
    public function handle(Command $command): Room
    {
        $room = $command->room();

        $this->roomRepository->store($room);

        return $room;
    }
}
