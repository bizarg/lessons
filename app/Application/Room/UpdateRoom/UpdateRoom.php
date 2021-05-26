<?php

declare(strict_types=1);

namespace App\Application\Room\UpdateRoom;

use App\Domain\Room\Room;
use App\Http\Requests\Room\UpdateRoomRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateRoom
 * @package App\Application\Room\UpdateRoom
 */
class UpdateRoom implements Command
{
    /**
     * @var Room
     */
    private Room $room;

    /**
     * UpdateRoom constructor.
     * @param Room $room
     */
    public function __construct(
        Room $room
    ) {
        $this->room = $room;
    }

    /**
     * @param Request|UpdateRoomRequest $request
     * @param Room $room
     * @return self
     */
    public static function fromRequest(Request $request, Room $room): self
    {
        return (new self(
            $room
        ));
    }

    /**
     * @return Room
     */
    public function room(): Room
    {
        return $this->room;
    }
}
