<?php

declare(strict_types=1);

namespace App\Application\Message\DeleteMessage;

use App\Domain\Message\Message;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeleteMessage
 * @package App\Application\Message
 */
class DeleteMessage implements Command
{
    /**
     * @var Message
     */
    private Message $message;

    /**
     * DeleteMessage constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return Message
     */
    public function message(): Message
    {
        return $this->message;
    }
}
