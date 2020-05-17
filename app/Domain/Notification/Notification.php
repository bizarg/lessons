<?php

declare(strict_types=1);

namespace App\Domain\Notification;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * @package App\Domain\Notification
 */
class Notification extends Model
{
    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'notifications.created_at'
    ];

    /** @var string */
    protected $table = 'notifications';
}
