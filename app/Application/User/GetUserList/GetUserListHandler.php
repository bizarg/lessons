<?php

declare(strict_types=1);

namespace App\Application\User\GetUserList;

use App\Infrastructure\Eloquent\EloquentUserRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetUserListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetUserListHandler implements Handler
{
    /**
     * @var EloquentUserRepository
     */
    private EloquentUserRepository $userRepository;

    /**
     * GetLeadStatusListHandler constructor.
     * @param EloquentUserRepository $userRepository
     */
    public function __construct(
        EloquentUserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Command $command
     * @return LengthAwarePaginator|mixed
     * @throws Exception
     */
    public function handle(Command $command)
    {
		return $this->userRepository
            ->setFilter($command->filter())
            ->setOrder($command->order())
			->pagination($command->pagination());
    }
}
