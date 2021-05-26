<?php

declare(strict_types=1);

namespace App\Application\Message\GetMessageList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Message\MessageFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetMessageList
 * @package App\Application\Message\GetMessageList
 */
class GetMessageList implements Command
{
    /**
     * @var MessageFilter|null
     */
    private ?MessageFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetMessageList constructor.
     * @param MessageFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(
        MessageFilter $filter = null,
        Pagination $pagination = null,
        Order $order = null
    ) {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return MessageFilter|null
     */
    public function filter(): ?MessageFilter
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
