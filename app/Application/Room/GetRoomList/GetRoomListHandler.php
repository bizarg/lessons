<?php

declare(strict_types=1);

namespace App\Application\Room\GetRoomList;

use App\Domain\Room\RoomRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetRoomListHandler
 * @package App\Application\Room\GetRoomList
 */
class GetRoomListHandler implements Handler
{
    /**
     * @var RoomRepository
     */
    private RoomRepository $roomRepository;

    /**
     * GetRoomListHandler constructor.
     * @param RoomRepository $roomRepository
     */
    public function __construct(
        RoomRepository $roomRepository
    ) {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetRoomList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->roomRepository
        	->setFilter($command->filter())
        	->setOrder($command->order())
        	->pagination($command->pagination());
    }
}
