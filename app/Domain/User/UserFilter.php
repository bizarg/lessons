<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Core\Filter;
use Illuminate\Http\Request;

/**
 * Class UserFilter
 * @package App\Domain\User
 */
class UserFilter implements Filter
{
    /** @var string|null */
    private ?string $query;

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request)
    {
        return (new self())
            ->setQuery($request->get('query'));
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
