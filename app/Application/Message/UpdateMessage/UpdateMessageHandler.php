<?php

declare(strict_types=1);

namespace App\Application\Message\UpdateMessage;

use App\Domain\Message\Message;
use App\Domain\Message\MessageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateMessageHandler
 * @package App\Application\Message\UpdateMessage
 */
class UpdateMessageHandler implements Handler
{
    /**
     * @var MessageRepository
     */
    private MessageRepository $messageRepository;

    /**
     * UpdateMessageHandler constructor.
     * @param MessageRepository $messageRepository
     */
    public function __construct(
        MessageRepository $messageRepository
    ) {
        $this->messageRepository = $messageRepository;
    }

    /**
     * @param Command|UpdateMessage $command
     * @return Message
     */
    public function handle(Command $command): Message
    {
        $message = $command->message();

        $this->messageRepository->store($message);

        return $message;
    }
}
