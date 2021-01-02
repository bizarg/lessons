<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use Bizarg\Repository\Contract\Order;
use Bizarg\Repository\Contract\Pagination;
use Bizarg\Repository\Contract\Filter;
use Bizarg\Repository\AbstractRepository;
use App\Domain\Skill\Skill;
use App\Domain\Skill\SkillFilter;
use App\Domain\Skill\SkillRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;

/**
 * Class EloquentSkillRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentSkillRepository extends AbstractRepository implements SkillRepository
{
    /**
     * @var string
     */
	protected string $table = 'skills.';

    /**
     * EloquentSkillRepository constructor.
     * @param Skill $model
     * @param Application $app
     */
    public function __construct(
        Skill $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

	/**
     * @param Filter|SkillFilter $filter
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
