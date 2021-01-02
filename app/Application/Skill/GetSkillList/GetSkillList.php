<?php

declare(strict_types=1);

namespace App\Application\Skill\GetSkillList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use App\Domain\Skill\SkillFilter;
use ItDevgroup\CommandBus\Command;

/**
 * Class GetSkillList
 * @package App\Application\Skill\GetSkillList
 */
class GetSkillList implements Command
{
    /**
     * @var SkillFilter|null
     */
    private ?SkillFilter $filter;
    /**
     * @var Pagination|null
     */
    private ?Pagination $pagination;
    /**
     * @var Order|null
     */
    private ?Order $order;

    /**
     * GetSkillList constructor.
     * @param SkillFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(
        SkillFilter $filter = null,
        Pagination $pagination = null,
        Order $order = null
    ) {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return SkillFilter|null
     */
    public function filter(): ?SkillFilter
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
