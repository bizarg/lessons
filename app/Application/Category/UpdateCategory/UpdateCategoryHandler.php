<?php

declare(strict_types=1);

namespace App\Application\Category\UpdateCategory;

use App\Domain\Category\Category;
use App\Domain\Category\CategoryRepository;
use Exception;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateCategoryHandler
 * @package App\Application\Category\UpdateCategory
 */
class UpdateCategoryHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * UpdateCategoryHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Command|UpdateCategory $command
     * @return Category
     * @throws Exception
     */
    public function handle(Command $command): Category
    {
        $category = $command->category();
        $category->title = $command->title();
        $category->description = $command->description();

        $this->categoryRepository->store($category);

        return $category;
    }
}
