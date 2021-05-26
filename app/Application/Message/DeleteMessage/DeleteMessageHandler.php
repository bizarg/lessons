<?php

declare(strict_types=1);

namespace App\Application\Message\DeleteMessage;

use App\Domain\Message\MessageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteMessageHandler
 * @package App\Application\Message
 */
class DeleteMessageHandler implements Handler
{
    /**
     * @var MessageRepository
     */
    private MessageRepository $messageRepository;

    /**
     * DeleteMessageHandler constructor.
     * @param MessageRepository $messageRepository
     */
    public function __construct(
        MessageRepository $messageRepository
    ) {
        $this->messageRepository = $messageRepository;
    }

    /**
     * @param Command|DeleteMessage $command
     * @return void
     */
    public function handle(Command $command): void
    {
        $this->messageRepository->delete($command->message());
    }
}
