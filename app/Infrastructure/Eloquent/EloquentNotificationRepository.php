<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationFilter;
use App\Domain\Notification\NotificationRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentNotificationRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentNotificationRepository extends AbstractEloquentRepository implements NotificationRepository
{
	/** @var string */
	protected string $table = 'notifications.';

    /**
     * EloquentLeadRepository constructor.
     * @param Notification $model
     * @param Application $app
     */
    public function __construct(
        Notification $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter|NotificationFilter $filter
     * @return void
     */
    protected function filter(Filter $filter): void
    {
        if ($filter->query()) {
            $this->builder->where(function (Builder $builder) use ($filter) {
                $query = '%' . strtolower($filter->query()) . '%';
            });
        }
    }
}
