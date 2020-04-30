<?php

declare(strict_types=1);

namespace App\Domain\Language;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * @package App\Domain\Language
 */
class Language extends Model
{
    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'languages.created_at'
    ];

    /** @var string */
    protected $table = 'languages';
}
