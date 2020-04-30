<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Filter;
use App\Domain\Language\Language;
use App\Domain\Language\LanguageFilter;
use App\Domain\Language\LanguageRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

/**
 * Class EloquentLanguageRepository
 * @package App\Infrastructure\Eloquent
 */
class EloquentLanguageRepository extends AbstractEloquentRepository implements LanguageRepository
{
	/** @var string */
	protected string $table = 'languages.';

    /**
     * EloquentLeadRepository constructor.
     * @param Language $model
     * @param Application $app
     */
    public function __construct(
        Language $model,
        Application $app
    ) {
        $this->model = $model;
        $this->app = $app;
    }

    /**
     * @param Filter|LanguageFilter $filter
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
