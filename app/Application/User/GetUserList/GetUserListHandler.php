<?php

declare(strict_types=1);

namespace App\Application\User\GetUserList;

use App\Domain\User\UserRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetUserListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetUserListHandler implements Handler
{
    /**
     * @var UserRepository
     */
    private UserRepository $customerRepository;

    /**
     * GetLeadStatusListHandler constructor.
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
     * @param Command|GetUserList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
		return $this->userRepository->setFilter($command->filter())->setOrder($command->order())
			->paginate($command->pagination());
    }
}
