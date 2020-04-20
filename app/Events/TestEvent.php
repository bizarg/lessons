<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var string
     */
    private $message;

    /**
     * Create a new event instance.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;

        $this->dontBroadcastToCurrentUser();
    }

    /**
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'data' => 'key'
        ];
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'chat';
    }
}
