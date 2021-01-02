<?php

declare(strict_types=1);

namespace App\Application\Category\UpdateCategory;

use App\Domain\Category\Category;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateCategory
 * @package App\Application\Category\UpdateCategory
 */
class UpdateCategory implements Command
{
    /**
     * @var Category
     */
    private Category $category;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * UpdateCategory constructor.
     * @param Category $category
     * @param string $title
     * @param string|null $description
     */
    public function __construct(
        Category $category,
        string $title,
        ?string $description
    ) {
        $this->category = $category;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @param Request|UpdateCategoryRequest $request
     * @param Category $category
     * @return self
     */
    public static function fromRequest(Request $request, Category $category): self
    {
        return (new self(
            $category,
            $request->title,
            $request->description
        ));
    }

    /**
     * @return Category
     */
    public function category(): Category
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }
}
