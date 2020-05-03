<?php

namespace App\Domain\Core;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface InterfaceRepository
 * @package Api\Domain\Core
 */
interface InterfaceRepository
{
    /**
     * @return Collection
     */
    public function collection(): Collection;
    /**
     * @param Pagination|null $pagination
     * @return LengthAwarePaginator
     */
    public function paginate(Pagination $pagination): LengthAwarePaginator;
    /**
     * @param string $value
     * @param string|null $key
     * @return Collection
     */
    public function pluck(string $value, ?string $key = null): Collection;
    /**
     * @param Model $model
     */
    public function store(Model $model): void;
    /**
     * @param Model $model
     */
    public function delete(Model $model): void;
    /**
     * @param Filter $filter
     * @return self
     */
    public function setFilter(Filter $filter);
    /**
     * @param Order $order
     * @return self
     */
    public function setOrder(Order $order);

    /**
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit);
}
