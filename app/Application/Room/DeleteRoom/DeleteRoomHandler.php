<?php

declare(strict_types=1);

namespace App\Application\Room\DeleteRoom;

use App\Domain\Room\RoomRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteRoomHandler
 * @package App\Application\Room
 */
class DeleteRoomHandler implements Handler
{
    /**
     * @var RoomRepository
     */
    private RoomRepository $roomRepository;

    /**
     * DeleteRoomHandler constructor.
     * @param RoomRepository $roomRepository
     */
    public function __construct(
        RoomRepository $roomRepository
    ) {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @param Command|DeleteRoom $command
     * @return void
     */
    public function handle(Command $command): void
    {
        $this->roomRepository->delete($command->room());
    }
}
