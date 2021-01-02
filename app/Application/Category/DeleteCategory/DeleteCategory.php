<?php

declare(strict_types=1);

namespace App\Application\Category\DeleteCategory;

use App\Domain\Category\Category;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeleteCategory
 * @package App\Application\Category
 */
class DeleteCategory implements Command
{
    /**
     * @var Category
     */
    private Category $category;

    /**
     * DeleteCategory constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return Category
     */
    public function category(): Category
    {
        return $this->category;
    }
}
