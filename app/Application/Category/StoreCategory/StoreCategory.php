<?php

declare(strict_types=1);

namespace App\Application\Category\StoreCategory;

use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;
use phpDocumentor\Reflection\DocBlock\Description;

/**
 * Class StoreCategory
 * @package App\Application\Category
 */
class StoreCategory implements Command
{
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * StoreCategory constructor.
     * @param string $title
     * @param string|null $description
     */
    public function __construct(
        string $title,
        ?string $description
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @param Request|StoreCategoryRequest $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self(
            $request->title,
            $request->description
        ));
    }
}
