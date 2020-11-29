<?php

namespace App\Domain\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * Class Pagination
 * @package App\Domain\Core
 */
class Pagination
{
    /**
     * Default page and per page values.
     */
    public const DEFAULT_PAGE = 1;
    public const DEFAULT_PER_PAGE = 10;

    /**
     * @var int
     */
    private $page = 1;

    /**
     * @var int
     */
    private $perPage = 10;

    /**
     * Pagination constructor.
     *
     * @param int $page
     * @param int $perPage
     */
    public function __construct($page = self::DEFAULT_PAGE, $perPage = self::DEFAULT_PER_PAGE)
    {
        $this->page = $page ?: $this->page;
        $this->perPage = $perPage ?: $this->perPage;
    }

    /**
     * @return int
     */
    public function page()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function offset()
    {
        return $this->perPage * ($this->page - 1);
    }

    /**
     * @return int
     */
    public function limit()
    {
        return $this->perPage;
    }

    /**
     * @param Request $request
     * @return Pagination
     */
    public static function fromRequest(Request $request)
    {
        return new Pagination(self::getPageNumberFromRequest($request), self::getPerPageFromRequest($request));
    }

    /**
     * @param Request $request
     * @return int|mixed
     */
    public static function getPageNumberFromRequest(Request $request)
    {
        return Arr::get($request->get('page'), 'number', self::DEFAULT_PAGE);
    }

    /**
     * @param Request $request
     * @return int|mixed
     */
    public static function getPerPageFromRequest(Request $request)
    {
        return Arr::get($request->get('page'), 'size', self::DEFAULT_PER_PAGE);
    }
}
