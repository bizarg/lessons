<?php

declare(strict_types=1);

namespace App\Application\Category\StoreCategory;

use App\Domain\Category\Category;
use App\Domain\Category\CategoryRepository;
use Exception;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class StoreCategoryHandler
 * @package App\Application\Category
 */
class StoreCategoryHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * StoreCategoryHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Command|StoreCategory $command
     * @return Category
     * @throws Exception
     */
    public function handle(Command $command): Category
    {
        $category = Category::register(
            $command->title()
        );

        $category->description = $command->description();

        $this->categoryRepository->store($category);

        return $category;
    }
}
