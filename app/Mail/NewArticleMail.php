<?php

namespace App\Mail;

use App\Domain\Article\Article;
use App\Domain\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class NewArticleMail
 * @package App\Mail
 */
class NewArticleMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /** @var User */
    private User $user;
    /** @var Article */
    private Article $article;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Article $article
     */
    public function __construct(
        User $user,
        Article $article
    ) {
        $this->user = $user;
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->to($this->user->email)
            ->view('mails.article.new-article');
    }
}
