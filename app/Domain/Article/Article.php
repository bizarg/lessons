<?php

declare(strict_types=1);

namespace App\Domain\Article;

use Illuminate\Database\Eloquent\Model;

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
}
