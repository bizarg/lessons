<?php

declare(strict_types=1);

namespace App\Application\Notification\GetNotificationList;

use App\Domain\Notification\NotificationRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class GetNotificationListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetNotificationListHandler implements Handler
{
    /**
     * @var NotificationRepository
     */
    private NotificationRepository $customerRepository;

    /**
     * GetLeadStatusListHandler constructor.
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(
        NotificationRepository $notificationRepository
    ) {
        $this->notificationRepository = $notificationRepository;
    }
    /**
     * Handle a Command object
     *
     * @param Command|GetNotificationList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
		return $this->notificationRepository->setFilter($command->filter())->setOrder($command->order())
			->paginate($command->pagination());
    }
}
