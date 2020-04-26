<?php

declare(strict_types=1);

namespace App\Application\User\DeleteUser;

use App\Domain\User\User;
use Rosamarsky\CommandBus\Command;

/**
 * Class DeleteUser
 * @package App\Application\User
 */
class DeleteUser implements Command
{
    /** @var User */
    private User $user;

    /**
     * DeleteUser constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /** @return User */
    public function user(): User
    {
        return $this->user;
    }
}
