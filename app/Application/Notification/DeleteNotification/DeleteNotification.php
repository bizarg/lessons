<?php

declare(strict_types=1);

namespace App\Application\Notification\DeleteNotification;

use App\Domain\Notification\Notification;
use Rosamarsky\CommandBus\Command;

/**
 * Class DeleteNotification
 * @package App\Application\Notification
 */
class DeleteNotification implements Command
{
    /** @var Notification */
    private Notification $notification;

    /**
     * DeleteNotification constructor.
     * @param Notification $notification
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /** @return Notification */
    public function notification(): Notification
    {
        return $this->notification;
    }
}
