<?php

declare(strict_types=1);

namespace App\Application\Notification\RegisterNotification;

use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class RegisterNotificationHandler
 * @package App\Application\Notification
 */
class RegisterNotificationHandler implements Handler
{
    /**
     * @var NotificationRepository
     */
    private NotificationRepository $notificationRepository;

    /**
     * RegisterNotificationHandler constructor.
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(
        NotificationRepository $notificationRepository
    ) {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param Command|RegisterNotification $command
     * @return Notification
     */
    public function handle(Command $command)
    {
        $notification = new Notification();

        $this->notificationRepository->store($notification);

        return $notification;
    }
}
