<?php

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Exception;

/**
 * Class EloquentLeadRepository
 * @package App\Infrastructure\Eloquent
 */
abstract class AbstractEloquentRepository
{
    /**
     * @var Model
     */
    protected Model $model;
    /**
     * @var Application
     */
    protected Application $app;
    /**
     * @var Builder
     */
    protected Builder $builder;


    /**
     * @param Filter $filter
     * @return void
     */
    abstract protected function filter(Filter $filter): void;

    /**
     * @param Order|null $order
     * @return void
     */
    protected function sort(?Order $order): void
    {
        $this->builder->orderBy($order->field(), $order->direction());
    }

    /**
     * @param Filter $filter
     * @param Pagination|null $pagination
     * @param Order|null $sorting
     * @return LengthAwarePaginator|Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all(?Filter $filter = null, ?Pagination $pagination = null, ?Order $sorting = null)
    {
        $this->builder = $this->model->newQuery();

        if ($filter) {
            $this->filter($filter);
        }

        if ($sorting) {
            $this->sort($sorting);
        }

        if ($pagination) {
            return $this->builder->paginate($pagination->limit(), ['*'], 'page', $pagination->page());
        }

        return $this->builder->get();
    }

    /**
     * Get Lead by field
     *
     * @param mixed $value
     * @param string $field
     * @return Builder|Model|object
     */
    public function byField($value, $field)
    {
        $this->builder = $this->model->newQuery();
        return $this->builder
            ->where($field, '=', $value)
            ->first();
    }

    /**
     * Store entity
     *
     * @param Model $model
     * @return void
     */
    public function store($model)
    {
        $this->model = $model;
        $this->model->save();
    }

    /**
     * Delete entity
     *
     * @param Model $model
     * @return void
     * @throws Exception
     */
    public function delete($model)
    {
        $this->model = $model;
        $this->model->delete();
    }

    /**
     * @param array $ids
     * @throws Exception
     */
    public function deleteByIds($ids)
    {
        $this->builder = $this->model->newQuery();
        $this->builder->whereIn('id', $ids)->delete();
    }

    /**
     * @param string $field
     * @param array $array
     * @throws \Exception
     */
    public function deleteByField($field, $array)
    {
        $this->builder = $this->model->newQuery();
        $this->builder->whereIn($field, $array)->delete();
    }

    /**
     * Get Lead by field
     *
     * @param int $id
     * @return Model
     */
    public function byId(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $ids
     * @return Model[]|Collection
     */
    public function byIds(array $ids)
    {
        return $this->model->find($ids);
    }
}
