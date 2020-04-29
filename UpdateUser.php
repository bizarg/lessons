<?php

declare(strict_types=1);

namespace App\Application\User\UpdateUser;

use App\Domain\User\User;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class UpdateUser
 * @package App\Application\User\UpdateUser
 */
class UpdateUser implements Command
{
    /** @var User */
    private User $user;

    /**
     * UpdateUser constructor.
     * @param User $user
     */
    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    /**
     * @param Request|UserRequest $request
     * @param User $user
     * @return self
     */
    public static function fromRequest(Request $request, User $user): self
    {
        return (new self(
        	$user
        ));
    }

    /** @return User */
    public function user(): User
    {
        return $this->user;
    }
}
