<?php

declare(strict_types=1);

namespace App\Application\User\DeleteUser;

use App\Domain\User\UserRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class DeleteUserHandler
 * @package App\Application\User
 */
class DeleteUserHandler implements Handler
{
    /** @var UserRepository */
    private UserRepository $userRepository;

    /**
     * DeleteUserHandler constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    /**
     * Handle a Command object
     *
     * @param Command|DeleteUser $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $this->userRepository->delete($command->user());
    }
}
