<?php

namespace App\Notifications;

use App\Domain\Article\Article;
use App\Domain\User\User;
use App\Mail\NewArticleMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Class NewArticleNotification
 * @package App\Notifications
 */
class NewArticleNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /** @var Article */
    private Article $article;

    /**
     * Create a new notification instance.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via(User $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NewArticleMail
     */
    public function toMail(User $notifiable): NewArticleMail
    {
        return (new NewArticleMail($notifiable, $this->article));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase(User $notifiable): array
    {
        return [
            'message' => 'Created new Article ' . $this->article->title
        ];
    }

    /**
     * @param User $notifiable
     * @return BroadcastMessage|null
     */
    public function toBroadcast(User $notifiable): ?BroadcastMessage
    {
        return new BroadcastMessage([
            'message' => 'Created new Article ' . $this->article->title

        ]);
    }
}
