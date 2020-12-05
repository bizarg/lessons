<?php

declare(strict_types=1);

namespace App\Application\Language\GetLanguageList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Language\LanguageFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetLanguageList
 * @package App\Application\Language\GetLanguageList
 */
class GetLanguageList implements Command
{
    /**
     * @var LanguageFilter|null
     */
    private ?LanguageFilter $filter;
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
     * @param LanguageFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(LanguageFilter $filter = null, Pagination $pagination = null, Order $order = null)
    {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return LanguageFilter|null
     */
    public function filter(): ?LanguageFilter
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
