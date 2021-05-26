<?php

declare(strict_types=1);

namespace App\Application\Room\GetRoomList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Room\RoomFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetRoomList
 * @package App\Application\Room\GetRoomList
 */
class GetRoomList implements Command
{
    /**
     * @var RoomFilter|null
     */
    private ?RoomFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetRoomList constructor.
     * @param RoomFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(
        RoomFilter $filter = null,
        Pagination $pagination = null,
        Order $order = null
    ) {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return RoomFilter|null
     */
    public function filter(): ?RoomFilter
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
