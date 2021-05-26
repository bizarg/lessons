<?php

declare(strict_types=1);

namespace App\Application\Room\StoreRoom;

use App\Domain\User\User;
use App\Http\Requests\Room\StoreRoomRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class StoreRoom
 * @package App\Application\Room
 */
class StoreRoom implements Command
{
    /**
     * @var string
     */
    private string $title;
    /**
     * @var User
     */
    private User $user;

    /**
     * StoreRoom constructor.
     */
    public function __construct(
        string $title,
        User $user
    ) {
        $this->title = $title;
        $this->user = $user;
    }

    /**
     * @param Request|StoreRoomRequest $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self(
            $request->title,
            $request->user()
        ));
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }
}
