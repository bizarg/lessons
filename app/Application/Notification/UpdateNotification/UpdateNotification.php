<?php

declare(strict_types=1);

namespace App\Application\Notification\UpdateNotification;

use App\Domain\Notification\Notification;
use App\Http\Requests\Notification\NotificationRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateNotification
 * @package App\Application\Notification\UpdateNotification
 */
class UpdateNotification implements Command
{
    /** @var Notification */
    private Notification $notification;

    /**
     * UpdateNotification constructor.
     * @param Notification $notification
     */
    public function __construct(
        Notification $notification
    ) {
        $this->notification = $notification;
    }

    /**
     * @param Request|NotificationRequest $request
     * @param Notification $notification
     * @return self
     */
    public static function fromRequest(Request $request, Notification $notification): self
    {
        return (new self(
        	$notification
        ));
    }

    /** @return Notification */
    public function notification(): Notification
    {
        return $this->notification;
    }
}
