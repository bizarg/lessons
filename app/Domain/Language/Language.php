<?php

declare(strict_types=1);

namespace App\Domain\Language;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @package App\Domain\Language
 * @property int $id
 * @property string $code
 * @property string $title
 * @property int $is_default
 * @property string|null $icon
 * @property int $is_available_on_mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereIsAvailableOnMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Language\Language whereUpdatedAt($value)
 * @mixin \Eloquent
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
