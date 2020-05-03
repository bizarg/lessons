<?php

namespace App\Events;

use App\Domain\Article\Article;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class NewArticleEvent
 * @package App\Events
 */
class NewArticleEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /** @var Article */
    private Article $article;

    /**
     * Create a new event instance.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }
//
//    /**
//     * Get the channels the event should broadcast on.
//     *
//     * @return Channel|array
//     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }

    /** @return Article */
    public function article(): Article
    {
        return $this->article;
    }
}
