<?php

declare(strict_types=1);

namespace App\Application\Room\DeleteRoom;

use App\Domain\Room\Room;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeleteRoom
 * @package App\Application\Room
 */
class DeleteRoom implements Command
{
    /**
     * @var Room
     */
    private Room $room;

    /**
     * DeleteRoom constructor.
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * @return Room
     */
    public function room(): Room
    {
        return $this->room;
    }
}
