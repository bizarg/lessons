<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use Bizarg\Repository\Contract\Order;
use Bizarg\Repository\Contract\Pagination;
use Bizarg\Repository\Contract\Filter;
use Bizarg\Repository\AbstractRepository;
use App\Domain\Role\Role;
use App\Domain\Role\RoleFilter;
use App\Domain\Role\RoleRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * Class EloquentRoleRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentRoleRepository extends AbstractRepository implements RoleRepository
{
    /**
     * @var string
     */
	protected string $table = 'roles.';

    /**
     * EloquentRoleRepository constructor.
     * @param Role $model
     * @param Application $app
     */
    public function __construct(
        Role $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

	/**
     * @param Filter|RoleFilter $filter
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
