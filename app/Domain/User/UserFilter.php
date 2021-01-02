<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Core\Filter;
use Illuminate\Http\Request;

/**
 * Class UserFilter
 * @package App\Domain\User
 */
class UserFilter extends Filter
{
    /** @var string|null */
    private ?string $query = null;
    /** @var int|null */
    private ?int $user = null;
    /** @var int|null */
    private ?int $userIdMoreThan = null;
    /** @var array|null */
    private ?array $excludeUsers = null;

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request)
    {
        return (new self())
            ->setExcludeUsers($request->get('excludeUsers'))
            ->setUser($request->get('user'))
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

    /** @return int|null */
    public function user(): ?int
    {
        return $this->user;
    }

    /**
     * @param int|null $user
     * @return self
     */
    public function setUser(?int $user): self
    {
        $this->user = $user;
        return $this;
    }

    /** @return int|null */
    public function userIdMoreThan(): ?int
    {
        return $this->userIdMoreThan;
    }

    /**
     * @param int|null $userIdMoreThan
     * @return self
     */
    public function setUserIdMoreThan(?int $userIdMoreThan): self
    {
        $this->userIdMoreThan = $userIdMoreThan;
        return $this;
    }

    /** @return array|null */
    public function excludeUsers(): ?array
    {
        return $this->excludeUsers;
    }

    /**
     * @param array|null $excludeUsers
     * @return self
     */
    public function setExcludeUsers(?array $excludeUsers): self
    {
        $this->excludeUsers = $excludeUsers;
        return $this;
    }
}
