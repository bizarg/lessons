<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Tag\Tag;
use App\Domain\Tag\TagFilter;
use App\Domain\Tag\TagRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentTagRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentTagRepository extends AbstractEloquentRepository implements TagRepository
{
	/** @var string */
	protected string $table = 'tags.';

    /**
     * EloquentLeadRepository constructor.
     * @param Tag $model
     * @param Application $app
     */
    public function __construct(
        Tag $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter|TagFilter $filter
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
