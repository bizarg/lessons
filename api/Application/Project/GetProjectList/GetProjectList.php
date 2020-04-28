<?php

declare(strict_types=1);

namespace Api\Application\Project\GetProjectList;

use App\Domain\Core\Order;
use App\Domain\Core\Pagination;
use Api\Domain\Project\ProjectFilter;
use Rosamarsky\CommandBus\Command;

/**
 * Class GetProjectList
 * @package Api\Application\Project\GetProjectList
 */
class GetProjectList implements Command
{
    /**
     * @var ProjectFilter|null
     */
    private ?ProjectFilter $filter;
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
     * @param ProjectFilter $filter
     * @param Pagination|null $pagination
     * @param Order|null $order
     */
    public function __construct(ProjectFilter $filter = null, Pagination $pagination = null, Order $order = null)
    {
        $this->filter = $filter;
        $this->pagination = $pagination;
        $this->order = $order;
    }

    /**
     * @return ProjectFilter|null
     */
    public function filter(): ?ProjectFilter
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
