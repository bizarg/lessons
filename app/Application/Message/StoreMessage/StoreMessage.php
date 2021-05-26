<?php

declare(strict_types=1);

namespace App\Application\Message\StoreMessage;

use App\Http\Requests\Message\StoreMessageRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class StoreMessage
 * @package App\Application\Message
 */
class StoreMessage implements Command
{
    /**
     * StoreMessage constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|StoreMessageRequest $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self(
        ));
    }
}
