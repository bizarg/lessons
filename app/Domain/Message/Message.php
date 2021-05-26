<?php

declare(strict_types=1);

namespace App\Domain\Message;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Message
 *
 * @package App\Domain\Message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property int $room_id
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereDeletedAt($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereRoomId($value)
 * @method static Builder|Message whereText($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @method static Builder|Message whereUserId($value)
 */
class Message extends Model
{
    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'messages.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'messages';

    /**
     * @return self
     */
    public static function register(
    ): self {
        $self = new self();
        return $self;
    }
}
