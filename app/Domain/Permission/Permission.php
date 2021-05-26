<?php

declare(strict_types=1);

namespace App\Domain\Permission;

use Eloquent;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission as BasePermission;

/**
 * Class Permission
 *
 * @package App\Domain\Permission
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property-read \Illuminate\Database\Eloquent\Collection|BasePermission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\User\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
class Permission extends BasePermission
{
    /**
     * @var string
     */
    public const ROLE_STORE = 'roles.store';
    /**
     * @var string
     */
    public const ROLE_UPDATE = 'roles.update';
    /**
     * @var string
     */
    public const ROLE_DESTOY = 'roles.destroy';
    /**
     * @var string
     */
    public const ROLE_SHOW = 'roles.show';
    /**
     * @var string
     */
    public const ROLE_INDEX = 'roles.index';

    /**
     * @var array
     */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'permissions.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'permissions';

    /**
     * @param string $name
     * @param string $guardName
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
