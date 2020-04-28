<?php

namespace App\Domain\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
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
     * @param Model $lead
     */
    public function store(Model $lead): void;
    /**
     * @param Model $lead
     */
    public function delete(Model $lead): void;
    /**
     * @param Filter $filter
     * @return self
     */
    public function setFilter(Filter $filter): self;
    /**
     * @param Order $order
     * @return self
     */
    public function setOrder(Order $order): self;
}
