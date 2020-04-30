<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Language\DeleteLanguage\DeleteLanguage;
use App\Application\Language\GetLanguageList\GetLanguageList;
use App\Application\Language\RegisterLanguage\RegisterLanguage;
use App\Application\Language\UpdateLanguage\UpdateLanguage;
use App\Domain\Language\Language;
use App\Http\Requests\Language\LanguageRequest;
use App\Http\Requests\Language\LanguageIndexRequest;
use App\Http\Resources\Language\LanguageResource;
use App\Http\Resources\Language\LanguageResourceCollection;
use App\Domain\Language\LanguageFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(LanguageIndexRequest $request): JsonResponse
    {
        $filter = LanguageFilter::fromRequest($request);
        $order = Order::fromRequest($request, Language::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);

        $languages = $this->dispatchCommand(new GetLanguageList($filter, $pagination, $order));

        return response()->json(new LanguageResourceCollection($languages), Response::HTTP_OK);
    }

    /**
     * @param LanguageRequest $request
     * @return JsonResponse
     */
    public function store(LanguageRequest $request): JsonResponse
    {
        $language = $this->dispatchCommand(RegisterLanguage::fromRequest($request));

        return response()->json(['data' => new LanguageResource($language)], Response::HTTP_CREATED);
    }

    /**
     * @param LanguageRequest $request
     * @param Language $language
     * @return JsonResponse
     */
    public function update(LanguageRequest $request, Language $language): JsonResponse
    {
        $language = $this->dispatchCommand(UpdateLanguage::fromRequest($request, $language));

        return response()->json([
            'data' => new LanguageResource($language)
        ], Response::HTTP_OK);
    }

	/**
     * @param Language $language
     * @return JsonResponse
     */
    public function show(Language $language): JsonResponse
    {
        return response()->json(['data' => new LanguageResource($language)]);
    }

    /**
     * @param Language $language
     * @return JsonResponse
     */
    public function destroy(Language $language): JsonResponse
    {
        $this->dispatchCommand(new DeleteLanguage($language));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
