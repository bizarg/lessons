<?php

declare(strict_types=1);

namespace App\Application\User\RegisterUser;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class RegisterUserHandler
 * @package App\Application\User
 */
class RegisterUserHandler implements Handler
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * RegisterUserHandler constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Command|RegisterUser $command
     * @return User
     */
    public function handle(Command $command)
    {
        $user = new User();

        $this->userRepository->store($user);

        return $user;
    }
}
