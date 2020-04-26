<?php

namespace App\Http\Resources;

use App\Domain\Core\Pagination;
use App\Helpers\PaginationHelper;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ResourceCollectionWithStandardResponse
 * @package Api\Http\Resources
 */
abstract class ResourceCollectionWithStandardResponse extends ResourceCollection
{
    /**
     * Get item resource.
     *
     * @param object $item
     *
     * @return object|array|string
     */
    abstract protected function getItemData($item);

    /**
     * Get route name for linksHelper.
     * @return string|null
     */
    abstract protected function getLinksHelperRouteName();

    /**
     * @var int
     */
    protected $totalItems;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var array
     */
    protected array $routeParams = [];

    /**
     * ResourceCollectionWithStandardResponse constructor.
     * @param mixed $collection
     */
    public function __construct($collection)
    {
        if (get_class($collection) == LengthAwarePaginator::class) {
            $this->collection = $collection->items();
            $this->totalItems = $collection->total();
        }
        if (
            get_class($collection) == Collection::class
            || (get_class($collection) == \Illuminate\Support\Collection::class)
        ) {
            $this->collection = $collection;
            $this->totalItems = count($collection);
        }
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     *
     * @return array
     * @throws BindingResolutionException
     */
    public function toArray($request)
    {
        // Set request.
        $this->request = $request;

        // Prepare data.
        $response['data'] = [];
        foreach ($this->collection as $item) {
            $response['data'][] = $this->getItemData($item);
        }

        // Prepare meta data.
        $metaData = $this->getMetaData();
        if (!is_null($metaData)) {
            $response['meta'] = $metaData;
        }

        // Prepare links data (only if route name is not null).
        if (!is_null($this->getLinksHelperRouteName())) {
            $response['links'] = $this->getLinksData();
        }

        return $response;
    }

    /**
     * @return PaginationHelper
     * @throws BindingResolutionException
     */
    protected function linksHelper()
    {
        return app()->make(PaginationHelper::class);
    }

    /**
     * @return array
     * @throws BindingResolutionException
     */
    protected function getMetaData()
    {
        // Prepare meta data.
        return [
            'totalPages' => $this->linksHelper()->totalPages(
                $this->totalItems,
                Pagination::getPerPageFromRequest($this->request)
            ),
            'totalItems' => $this->totalItems
        ];
    }

    /**
     * Prepare links data (only if route name is not null).
     *
     * @return array
     * @throws BindingResolutionException
     */
    protected function getLinksData()
    {
        return $this->linksHelper()->links(
            Pagination::getPageNumberFromRequest($this->request),
            Pagination::getPerPageFromRequest($this->request),
            $this->getLinksHelperRouteName(),
            $this->totalItems,
            $this->routeParams
        );
    }
}
