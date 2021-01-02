<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use Bizarg\Repository\Contract\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Bizarg\Repository\AbstractRepository;

/**
 * Class EloquentUserRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentUserRepository extends AbstractRepository implements UserRepository
{
    /**
     * @var User|Model
     */
    protected Model $model;
    /**
     * @var Application
     */
    private Application $app;

    /**
     * EloquentLeadRepository constructor.
     * @param User $model
     * @param Application $app
     */
    public function __construct(
        User $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter $filter
     * @return void
     */
    protected function filter(Filter $filter): void
    {
        if ($filter->query()) {
            $this->builder->where(function (Builder $builder) use ($filter) {
                $query = '%' . strtolower($filter->query()) . '%';
            });
        }

        if ($filter->user()) {
            $this->builder->where('id', $filter->user());
        }

        if ($filter->userIdMoreThan()) {
            $this->builder->where('id', '>', $filter->userIdMoreThan());
        }

        if ($filter->excludeUsers()) {
            $this->builder->whereNotIn('id', $filter->excludeUsers());
        }
    }
}
