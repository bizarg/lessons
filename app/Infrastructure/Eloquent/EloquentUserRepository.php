<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\User\User;
use App\Domain\User\UserFilter;
use App\Domain\User\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentUserRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
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
     * @param Filter|UserFilter $filter
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
