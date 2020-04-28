<?php

declare(strict_types=1);

namespace App\Application\Article\GetArticleList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Article\ArticleFilter;
use Rosamarsky\CommandBus\Command;

/**
 * Class GetArticleList
 * @package App\Application\Article\GetArticleList
 */
class GetArticleList implements Command
{
    /** @var Pagination */
    private Pagination $pagination;
    /** @var ArticleFilter|null */
    private ?ArticleFilter $filter;
    /** @var Order|null */
    private ?Order $order;

    /**
     * GetArticleList constructor.
     * @param Pagination $pagination
     * @param ArticleFilter|null $filter
     * @param Order|null $order
     */
    public function __construct(Pagination $pagination, ?ArticleFilter $filter = null, Order $order = null)
    {
        $this->pagination = $pagination;
        $this->filter = $filter;
        $this->order = $order;
    }

    /** @return Pagination */
    public function pagination(): Pagination
    {
        return $this->pagination;
    }

    /** @return ArticleFilter|null */
    public function filter(): ?ArticleFilter
    {
        return $this->filter;
    }

    /** @return Order|null */
    public function order(): ?Order
    {
        return $this->order;
    }
}
