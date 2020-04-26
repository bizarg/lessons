<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Article\Article;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Domain\User
 */
class User extends Authenticatable
{
    use Notifiable;

    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'users.created_at'
    ];

    /** @var string */
    protected $table = 'users';

    /** @var array */
    protected $fillable = ['name', 'email', 'password'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'author_id', 'id');
    }
}
