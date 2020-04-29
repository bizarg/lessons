<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Article\DeleteArticle\DeleteArticle;
use App\Application\Article\GetArticleList\GetArticleList;
use App\Application\Article\RegisterArticle\RegisterArticle;
use App\Application\Article\UpdateArticle\UpdateArticle;
use App\Domain\Article\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Article\ArticleResourceCollection;
use App\Domain\Article\ArticleFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filter = ArticleFilter::fromRequest($request);
        $order = Order::fromRequest($request, Article::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);

        $articles = $this->dispatch(new GetArticleList($filter, $pagination, $order));

        return response()->json(new ArticleResourceCollection($articles), Response::HTTP_OK);
    }

    /**
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $article = $this->dispatch(RegisterArticle::fromRequest($request));

        return response()->json(['data' => new ArticleResource($article)], Response::HTTP_CREATED);
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $article = $this->dispatch(UpdateArticle::fromRequest($request, $article));

        return response()->json([
            'data' => new ArticleResource($article)
        ], Response::HTTP_OK);
    }

	/**
     * @param Article $article
     * @return JsonResponse
     */
    public function show(Article $article): JsonResponse
    {
        return response()->json(['data' => new ArticleResource($article)]);
    }

    /**
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        $this->dispatch(new DeleteArticle($article));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
