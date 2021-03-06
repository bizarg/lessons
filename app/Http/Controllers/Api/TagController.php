<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Application\Tag\DeleteTag\DeleteTag;
use App\Application\Tag\GetTagList\GetTagList;
use App\Application\Tag\RegisterTag\RegisterTag;
use App\Application\Tag\UpdateTag\UpdateTag;
use App\Domain\Tag\Tag;
use App\Http\Requests\Tag\TagRequest;
use App\Http\Requests\Tag\TagIndexRequest;
use App\Http\Resources\Tag\TagResource;
use App\Http\Resources\Tag\TagResourceCollection;
use App\Domain\Tag\TagFilter;
use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class TagController
 * @package App\Http\Controllers
 */
class TagController extends Controller
{
    /**
     * @param TagIndexRequest $request
     * @return JsonResponse
     */
    public function index(TagIndexRequest $request): JsonResponse
    {
        $filter = TagFilter::fromRequest($request);
        $order = Order::fromRequest($request, Tag::ALLOWED_SORT_FIELDS);
        $pagination = Pagination::fromRequest($request);

        $tags = $this->dispatchCommand(new GetTagList($filter, $pagination, $order));

        return response()->json(new TagResourceCollection($tags), Response::HTTP_OK);
    }

    /**
     * @param TagRequest $request
     * @return JsonResponse
     */
    public function store(TagRequest $request): JsonResponse
    {
        $tag = $this->dispatchCommand(RegisterTag::fromRequest($request));

        return response()->json(['data' => new TagResource($tag)], Response::HTTP_CREATED);
    }

    /**
     * @param TagRequest $request
     * @param Tag $tag
     * @return JsonResponse
     */
    public function update(TagRequest $request, Tag $tag): JsonResponse
    {
        $tag = $this->dispatchCommand(UpdateTag::fromRequest($request, $tag));

        return response()->json([
            'data' => new TagResource($tag)
        ], Response::HTTP_OK);
    }

	/**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function show(Tag $tag): JsonResponse
    {
        return response()->json(['data' => new TagResource($tag)]);
    }

    /**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function destroy(Tag $tag): JsonResponse
    {
        $this->dispatchCommand(new DeleteTag($tag));

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
