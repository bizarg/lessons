<?php

namespace App\Infrastructure\Services;

use App\Domain\Article\Article;
use App\Domain\Role\Role;
use App\Domain\User\User;

/**
 * Class VariableParser
 * @package App\Infrastructure\Services
 */
class VariableData
{
    /**
     * @var User|null
     */
    private ?User $user = null;
    /**
     * @var Article|null
     */
    private ?Article $article = null;
    /**
     * @var Role|null
     */
    private ?Role $role = null;

    /**
     * @return User|null
     */
    public function user(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Article|null
     */
    public function article(): ?Article
    {
        return $this->article;
    }

    /**
     * @param Article|null $article
     * @return self
     */
    public function setArticle(?Article $article): self
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return Role|null
     */
    public function role(): ?Role
    {
        return $this->role;
    }

    /**
     * @param Role|null $role
     * @return self
     */
    public function setRole(?Role $role): self
    {
        $this->role = $role;
        return $this;
    }
}
