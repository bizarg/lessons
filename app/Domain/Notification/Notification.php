<?php

declare(strict_types=1);

namespace App\Domain\Notification;

use Illuminate\Notifications\DatabaseNotification;

/**
 * Class Notification
 *
 * @package App\Domain\Notification
 * @property mixed $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $data
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Notification\Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection|static[] all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection|static[] get($columns = ['*'])
 */
class Notification extends DatabaseNotification
{
    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'notifications.created_at'
    ];

    /** @var string */
    protected $table = 'notifications';

    /** @var array */
    protected $guarded = ['*'];

    protected $casts = [
        'id' => 'uuid'
    ];
}
