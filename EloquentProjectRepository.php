<?php

declare(strict_types=1);

namespace Api\Infrastructure\Eloquent;

use Api\Domain\Core\Filter;
use Api\Domain\Project\Project;
use Api\Domain\Project\ProjectFilter;
use Api\Domain\Project\ProjectRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentProjectRepository
 * @package Api\Infrastructure\Eloquent
 */
class EloquentProjectRepository extends AbstractEloquentRepository implements ProjectRepository
{
	/** @var string */
	protected string $table = 'projects.';

    /**
     * EloquentLeadRepository constructor.
     * @param Project $model
     * @param Application $app
     */
    public function __construct(
        Project $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter|ProjectFilter $filter
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
