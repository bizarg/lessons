<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use Bizarg\Repository\Contract\Order;
use Bizarg\Repository\Contract\Pagination;
use Bizarg\Repository\Contract\Filter;
use Bizarg\Repository\AbstractRepository;
use App\Domain\Category\CategoryFilter;
use App\Domain\Category\Category;
use App\Domain\Category\CategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * Class EloquentCategoryRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentCategoryRepository extends AbstractRepository implements CategoryRepository
{
    /**
     * @var string
     */
	protected string $table = 'categories.';

    /**
     * EloquentCategoryRepository constructor.
     * @param Category $model
     * @param Application $app
     */
    public function __construct(
        Category $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter|CategoryFilter $filter
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
