<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticleIndexRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('web.article.index');
    }
}
