<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use Bizarg\Repository\Contract\Order;
use Bizarg\Repository\Contract\Pagination;
use Bizarg\Repository\Contract\Filter;
use Bizarg\Repository\AbstractRepository;
use App\Domain\Permission\Permission;
use App\Domain\Permission\PermissionFilter;
use App\Domain\Permission\PermissionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * Class EloquentPermissionRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentPermissionRepository extends AbstractRepository implements PermissionRepository
{
    /**
     * @var string
     */
	protected string $table = 'permissions.';

    /**
     * EloquentPermissionRepository constructor.
     * @param Permission $model
     * @param Application $app
     */
    public function __construct(
        Permission $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

	/**
     * @param Filter|PermissionFilter $filter
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
