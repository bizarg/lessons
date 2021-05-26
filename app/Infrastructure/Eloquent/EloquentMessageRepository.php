<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use Bizarg\Repository\Contract\Order;
use Bizarg\Repository\Contract\Pagination;
use Bizarg\Repository\Contract\Filter;
use Bizarg\Repository\AbstractRepository;
use App\Domain\Message\Message;
use App\Domain\Message\MessageFilter;
use App\Domain\Message\MessageRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * Class EloquentMessageRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentMessageRepository extends AbstractRepository implements MessageRepository
{
    /**
     * @var string
     */
	protected string $table = 'messages.';

    /**
     * EloquentMessageRepository constructor.
     * @param Message $model
     * @param Application $app
     */
    public function __construct(
        Message $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

	/**
     * @param Filter|MessageFilter $filter
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
