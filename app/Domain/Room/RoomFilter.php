<?php

declare(strict_types=1);

namespace App\Domain\Room;

use Bizarg\Repository\Contract\Filter;
use Illuminate\Http\Request;

/**
 * Class RoomFilter
 * @package App\Domain\Room
 */
class RoomFilter implements Filter
{
    /**
     * @var string|null
     */
    private ?string $query = null;

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self())
            ->setQuery($request->input('query'));
    }

    /**
     * @return null|string
     */
    public function query(): ?string
    {
        return $this->query;
    }

    /**
     * @param null|string $query
     * @return self
     */
    public function setQuery(?string $query): self
    {
        $this->query = $query;
        return $this;
    }
}
