<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Article\Article;
use App\Domain\Article\ArticleFilter;
use App\Domain\Article\ArticleRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentArticleRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentArticleRepository extends AbstractEloquentRepository implements ArticleRepository
{
	/** @var string */
	protected string $table = 'articles.';

    /**
     * EloquentLeadRepository constructor.
     * @param Article $model
     * @param Application $app
     */
    public function __construct(
        Article $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter|ArticleFilter $filter
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
