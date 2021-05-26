<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use Bizarg\Repository\Contract\Order;
use Bizarg\Repository\Contract\Pagination;
use Bizarg\Repository\Contract\Filter;
use Bizarg\Repository\AbstractRepository;
use App\Domain\Room\Room;
use App\Domain\Room\RoomFilter;
use App\Domain\Room\RoomRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * Class EloquentRoomRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentRoomRepository extends AbstractRepository implements RoomRepository
{
    /**
     * @var string
     */
	protected string $table = 'rooms.';

    /**
     * EloquentRoomRepository constructor.
     * @param Room $model
     * @param Application $app
     */
    public function __construct(
        Room $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

	/**
     * @param Filter|RoomFilter $filter
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
