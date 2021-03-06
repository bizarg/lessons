<?php

declare(strict_types=1);

namespace App\Application\Article\GetArticleList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Article\ArticleFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetArticleList
 * @package App\Application\Article\GetArticleList
 */
class GetArticleList implements Command
{
    /**
     * @var ArticleFilter|null
     */
    private ?ArticleFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetLeadStatusList constructor.
     * @param ArticleFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(ArticleFilter $filter = null, Pagination $pagination = null, Order $order = null)
    {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return ArticleFilter|null
     */
    public function filter(): ?ArticleFilter
    {
        return $this->filter;
    }

    /**
     * @return Pagination|null
     */
    public function pagination(): ?Pagination
    {
        return $this->pagination;
    }

    /**
     * @return Order|null
     */
    public function order(): ?Order
    {
        return $this->order;
    }
}
