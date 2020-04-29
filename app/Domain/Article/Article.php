<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Article
 * @package App\Domain\Article
 */
class Article extends Model
{
    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'articles.created_at'
    ];

    /** @var string */
    protected $table = 'articles';

    /**
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
