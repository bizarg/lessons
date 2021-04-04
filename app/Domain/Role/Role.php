<?php

declare(strict_types=1);

namespace App\Domain\Role;

use Eloquent;
use Carbon\Carbon;
use Spatie\Permission\Models\Role as BaseRole;

/**
 * Class Role
 * @package App\Domain\Role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @mixin Eloquent
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
