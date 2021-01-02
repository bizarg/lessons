<?php

declare(strict_types=1);

namespace App\Domain\Skill;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Skill
 *
 * @package App\Domain\Skill
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @method static Builder|Skill newModelQuery()
 * @method static Builder|Skill newQuery()
 * @method static Builder|Skill query()
 * @method static Builder|Skill whereCreatedAt($value)
 * @method static Builder|Skill whereDeletedAt($value)
 * @method static Builder|Skill whereDescription($value)
 * @method static Builder|Skill whereId($value)
 * @method static Builder|Skill whereTitle($value)
 * @method static Builder|Skill whereUpdatedAt($value)
 */
class Skill extends Model
{
    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'skills.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'skills';

    /**
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
