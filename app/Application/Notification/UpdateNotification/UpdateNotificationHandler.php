<?php

declare(strict_types=1);

namespace App\Application\Notification\UpdateNotification;

use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateNotificationHandler
 * @package App\Application\Notification\UpdateNotification
 */
class UpdateNotificationHandler implements Handler
{
    /**
     * @var NotificationRepository
     */
    private NotificationRepository $notificationRepository;

    /**
     * UpdateNotificationHandler constructor.
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(
        NotificationRepository $notificationRepository
    ) {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param Command|UpdateNotification $command
     * @return Notification
     */
    public function handle(Command $command)
    {
        $notification = $command->notification();

        $this->notificationRepository->store($notification);

        return $notification;
    }
}
