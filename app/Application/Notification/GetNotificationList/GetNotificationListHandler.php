<?php

declare(strict_types=1);

namespace App\Application\Notification\GetNotificationList;

use App\Domain\Notification\NotificationRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetNotificationListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetNotificationListHandler implements Handler
{
    /**
     * @var NotificationRepository
     */
    private NotificationRepository $notificationRepository;

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
			->pagination($command->pagination());
    }
}
