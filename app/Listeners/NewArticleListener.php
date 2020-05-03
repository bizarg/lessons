<?php

namespace App\Listeners;

use App\Domain\Core\Pagination;
use App\Domain\User\User;
use App\Domain\User\UserFilter;
use App\Domain\User\UserRepository;
use App\Events\NewArticleEvent;
use App\Notifications\NewArticleNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * Class NewArticleListener
 * @package App\Listeners
 */
class NewArticleListener implements ShouldQueue
{
    /** @var UserRepository */
    private UserRepository $userRepository;

    /**
     * Create the event listener.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  NewArticleEvent  $event
     * @return void
     */
    public function handle(NewArticleEvent $event): void
    {
        $filter = (new UserFilter)
            ->setExcludeUsers([$event->article()->author_id])
            ->setUserIdMoreThan(0);

        $limit = 50;

        $users = $this->userRepository->setFilter($filter)->setLimit($limit)->collection();

         while ($users->count()) {
            $users->each(function ($user) use ($event){
                /** @var User $user */
                $user->notify(new NewArticleNotification($event->article()));
            });

            $filter->setUserIdMoreThan($users->max('id'));

            $users = $this->userRepository->setFilter($filter)->setLimit($limit)->collection();
         };

    }
}
