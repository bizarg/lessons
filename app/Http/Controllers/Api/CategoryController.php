<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Category\DeleteCategory\DeleteCategory;
use App\Application\Category\GetCategoryList\GetCategoryList;
use App\Application\Category\StoreCategory\StoreCategory;
use App\Application\Category\UpdateCategory\UpdateCategory;
use App\Domain\Category\Category;
use App\Http\Requests\Category\ListCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryResourceCollection;
use App\Domain\Category\CategoryFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Api
 */
class CategoryController extends Controller
{
    /**
     * @param ListCategoryRequest $request
     * @return JsonResponse
     */
    public function index(ListCategoryRequest $request): JsonResponse
    {
        $order = Order::fromRequest($request, Category::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);
        $filter = CategoryFilter::fromRequest($request);

        $categories = $this->dispatchCommand(new GetCategoryList($filter, $pagination, $order));

        return new JsonResponse(
            new CategoryResourceCollection($categories)
        );
    }

    /**
     * @param StoreCategoryRequest $request
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->dispatchCommand(StoreCategory::fromRequest($request));

        return new JsonResponse([
            'data' => new CategoryResource($category)
        ], Response::HTTP_CREATED);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category = $this->dispatchCommand(UpdateCategory::fromRequest($request, $category));

        return new JsonResponse([
            'data' => new CategoryResource($category)
        ]);
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        return new JsonResponse([
            'data' => new CategoryResource($category)
        ]);
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $this->dispatchCommand(new DeleteCategory($category));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
