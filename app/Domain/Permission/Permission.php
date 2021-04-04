<?php

declare(strict_types=1);

namespace App\Domain\Permission;

use Eloquent;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission as BasePermission;

/**
 * Class Permission
 * @package App\Domain\Permission
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
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
