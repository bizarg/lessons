<?php

declare(strict_types=1);

namespace App\Application\Category\GetCategoryList;

use App\Domain\Category\CategoryRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetCategoryListHandler
 * @package App\Application\Category\GetCategoryList
 */
class GetCategoryListHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * GetCategoryListHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetCategoryList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->categoryRepository
        	->setFilter($command->filter())
        	->setOrder($command->order())
        	->pagination($command->pagination());
    }
}
