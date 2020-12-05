<?php

declare(strict_types=1);

namespace App\Application\User\UpdateUser;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateUserHandler
 * @package App\Application\User\UpdateUser
 */
class UpdateUserHandler implements Handler
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UpdateUserHandler constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Command|UpdateUser $command
     * @return User
     */
    public function handle(Command $command)
    {
        $user = $command->user();

        $this->userRepository->store($user);

        return $user;
    }
}
