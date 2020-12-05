<?php

declare(strict_types=1);

namespace App\Application\Notification\DeleteNotification;

use App\Domain\Notification\NotificationRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteNotificationHandler
 * @package App\Application\Notification
 */
class DeleteNotificationHandler implements Handler
{
    /** @var NotificationRepository */
    private NotificationRepository $notificationRepository;

    /**
     * DeleteNotificationHandler constructor.
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
     * @param Command|DeleteNotification $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $this->notificationRepository->delete($command->notification());
    }
}
