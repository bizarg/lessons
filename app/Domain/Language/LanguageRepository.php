<?php

declare(strict_types=1);

namespace App\Domain\Language;

use App\Domain\Core\Filter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Interface LanguageRepository
 * @package App\Domain\Language
 */
interface LanguageRepository
{
    /**
     * @param Pagination|null $pagination
     * @return LengthAwarePaginator
     */
    public function pagination(Pagination $pagination): LengthAwarePaginator;

    /**
     * @return Collection
     */
    public function collection(): Collection;

    /**
     * @return Language|null
     */
    public function first();

    /**
     * @param int $id
     * @return Language|null
     */
    public function byId(int $id);

    /**
     * @param string $value
     * @param string|null $key
     * @return Collection
     */
    public function pluck(string $value, ?string $key = null): Collection;

    /**
     * @return int
     */
    public function count(): int;

    /**
     * @param Language $model
     */
    public function store(Language $model): void;

    /**
     * @param Language $model
     * @throws Exception
     */
    public function delete(Language $model): void;

    /**
     * @param Filter|null $filter
     * @return self
     */
    public function setFilter(?Filter $filter);

    /**
     * @param Order|null $order
     * @return self
     */
    public function setOrder(?Order $order);

    /**
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit);

    /**
     * @param string $value
     * @param string|null $key
     * @return bool
     */
    public function exists(string $value, ?string $key = null): bool;
}
