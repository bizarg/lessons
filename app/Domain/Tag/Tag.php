<?php

declare(strict_types=1);

namespace App\Domain\Tag;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\Tag as BaseTag;

/**
 * Class Tag
 *
 * @package App\Domain\Tag
 * @property int $id
 * @property array $name
 * @property array $slug
 * @property string|null $type
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Tags\Tag containing($name, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Tags\Tag ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Tag\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Tags\Tag withType($type = null)
 * @mixin \Eloquent
 */
class Tag extends BaseTag
{
    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'tags.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'tags';
}
