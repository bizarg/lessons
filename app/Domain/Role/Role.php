<?php

declare(strict_types=1);

namespace App\Domain\Role;

use Eloquent;
use Carbon\Carbon;
use Spatie\Permission\Models\Role as BaseRole;

/**
 * Class Role
 *
 * @package App\Domain\Role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\User\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
class Role extends BaseRole
{
    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'roles.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @return self
     */
    public static function register(
        string $name,
        string $guardName
    ): self {
        $self = new self();
        $self->name = $name;
        $self->guard_name = $guardName;
        return $self;
    }
}
