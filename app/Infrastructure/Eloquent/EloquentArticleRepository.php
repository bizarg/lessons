<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Article\Article;
use App\Domain\Article\ArticleFilter;
use App\Domain\Article\ArticleRepository;
use Bizarg\Repository\AbstractRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentArticleRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentArticleRepository extends AbstractRepository implements ArticleRepository
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
    protected function filter($filter): void
    {
        if ($filter->query()) {
            $this->builder->where(function (Builder $builder) use ($filter) {
                $query = '%' . strtolower($filter->query()) . '%';

                $this->joinUsers();

                $builder->where($this->table . 'title', 'like', $query)
                    ->orWhere('users.name', 'like', $query);
            });
        }
    }

    /**
     * @return void
     */
    protected function joinUsers(): void
    {
        $table = 'users';

        if (!$this->hasJoin($table)) {
            $this->builder->join($table, $table . '.id', '=', $this->table . 'author_id');
        }
    }
}
