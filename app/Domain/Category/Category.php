<?php

declare(strict_types=1);

namespace App\Domain\Category;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Category
 *
 * @package App\Domain\Category
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDeletedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereUpdatedAt($value)
 */
class Category extends Model
{
    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'categories.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @param string $title
     * @return self
     */
    public static function register(
        string $title
    ): self {
        $self = new self();
        $self->title = $title;
        return $self;
    }
}
