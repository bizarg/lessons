<?php

namespace App\Http\Controllers;

use App\Application\Article\DeleteArticle\DeleteArticle;
use App\Application\Article\GetArticleList\GetArticleList;
use App\Application\Article\RegisterArticle\RegisterArticle;
use App\Domain\Article\Article;
use App\Domain\Article\ArticleFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Events\NewArticleEvent;
use App\Http\Requests\Article\ArticleIndexRequest;
use App\Http\Requests\Article\ArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Article\ArticleResourceCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|JsonResponse|View
     */
    public function index(Request $request)
    {
        return view('web.article.index');
    }

    /**
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $article = $this->dispatchCommand(RegisterArticle::fromRequest($request, $this->user()));

        event(new NewArticleEvent($article));

        return response()->json(['data' => new ArticleResource($article)], Response::HTTP_CREATED);
    }

    /**
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        $this->dispatchCommand(new DeleteArticle($article));

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
