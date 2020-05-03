<?php

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Core\InterfaceRepository;
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
     * @var Filter|null
     */
    protected ?Filter $filter = null;
    /**
     * @var Order|null
     */
    protected ?Order $order = null;
    /**
     * @var string
     */
    protected string $table;
    /**
     * @var int|null
     */
    protected ?int $limit = null;

    /**
     * @param Filter $filter
     * @return void
     */
    abstract protected function filter(Filter $filter): void;

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        $this->builder = $this->model->newQuery();

        $this->filterAndOrder();

        return $this->builder->get();
    }

    /**
     * @param string $value
     * @param string|null $key
     * @return Collection
     */
    public function pluck(string $value, ?string $key = null): Collection
    {
        $this->builder = $this->model->newQuery();

        $this->filterAndOrder();

        return $this->builder->pluck($value, $key);
    }

    /**
     * @param Pagination $pagination
     * @return LengthAwarePaginator
     */
    public function paginate(Pagination $pagination): LengthAwarePaginator
    {
        $this->builder = $this->model->newQuery();

        $this->filterAndOrder();

        return $this->builder->paginate($pagination->limit(), ['*'], 'page', $pagination->page());
    }

    /**
     * @return Model|null
     */
    public function single(): ?Model
    {
        $this->builder = $this->model->newQuery();

        $this->filterAndOrder();

        return $this->builder->first();
    }

    /**
     * @param Order|null $order
     * @return void
     */
    protected function sort(?Order $order): void
    {
        $table = collect(explode('.', $order->field()))->first();

        if ($this->table != $table . '.') {
            $this->{'join' . ucfirst($table)}();
        }

        $this->builder->orderBy($order->field(), $order->direction());
    }

    /**
     * Store entity
     *
     * @param Model $model
     * @return void
     */
    public function store(Model $model): void
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
    public function delete(Model $model): void
    {
        $this->model = $model;
        $this->model->delete();
    }

    /**
     * @param string $table
     * @return bool
     */
    protected function hasJoin(string $table): bool
    {
        $joins = $this->builder->getQuery()->joins;

        if($joins == null) {
            return false;
        }

        foreach ($joins as $join) {
            if ($join->table == $table) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Filter $filter
     * @return self
     */
    public function setFilter(Filter $filter): self
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @param Order $order
     * @return self
     */
    public function setOrder(Order $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return void
     */
    public function reset(): void
    {
        $this->filter = null;
        $this->order = null;
    }

    /**
     * @param int $limit
     * @return void
     */
    private function limit(int $limit): void
    {
        $this->builder->limit($limit);
    }

    /**
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return void
     */
    private function filterAndOrder(): void
    {
        if ($this->filter) {
            $this->filter($this->filter);
        }

        if ($this->order) {
            $this->sort($this->order);
        }

        if ($this->limit) {
            $this->limit($this->limit);
        }

        $this->reset();
    }
}
