<?php

declare(strict_types=1);

namespace App\Application\Category\DeleteCategory;

use App\Domain\Category\CategoryRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteCategoryHandler
 * @package App\Application\Category
 */
class DeleteCategoryHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * DeleteCategoryHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Command|DeleteCategory $command
     * @return void
     * @throws Exception
     */
    public function handle(Command $command): void
    {
        $this->categoryRepository->delete($command->category());
    }
}
