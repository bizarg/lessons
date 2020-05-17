<?php

declare(strict_types=1);

namespace App\Application\Notification\RegisterNotification;

use App\Http\Requests\Notification\NotificationRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class RegisterNotification
 * @package App\Application\Notification
 */
class RegisterNotification implements Command
{
    /**
     * RegisterNotification constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|NotificationRequest $request
     * @return RegisterNotification
     */
    public static function fromRequest(Request $request)
    {
        return (new self(
        ));
    }
}
