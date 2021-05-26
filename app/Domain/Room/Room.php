<?php

declare(strict_types=1);

namespace App\Domain\Room;

use App\Domain\User\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Room
 *
 * @package App\Domain\Room
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
 * @property int $id
 * @property string $uuid
 * @property string $title
 * @property int $user_id
 * @property-read User $user
 * @method static Builder|Room newModelQuery()
 * @method static Builder|Room newQuery()
 * @method static Builder|Room query()
 * @method static Builder|Room whereCreatedAt($value)
 * @method static Builder|Room whereDeletedAt($value)
 * @method static Builder|Room whereId($value)
 * @method static Builder|Room whereTitle($value)
 * @method static Builder|Room whereUpdatedAt($value)
 * @method static Builder|Room whereUserId($value)
 * @method static Builder|Room whereUuid($value)
 */
class Room extends Model
{
    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'rooms.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'rooms';

    /**
     * @param string $title
     * @param int $user
     * @param string $uuid
     * @return self
     */
    public static function register(
        string $title,
        int $user,
        string $uuid
    ): self {
        $self = new self();
        $self->title = $title;
        $self->user_id = $user;
        $self->uuid = $uuid;
        return $self;
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id');
    }
}
