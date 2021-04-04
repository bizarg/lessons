<?php

declare(strict_types=1);

namespace App\Application\Role\UpdateRole;

use App\Domain\Role\Role;
use App\Http\Requests\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateRole
 * @package App\Application\Role\UpdateRole
 */
class UpdateRole implements Command
{
    /**
     * @var Role
     */
    private Role $role;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $guardName;
    private ?array $permissions;

    /**
     * UpdateRole constructor.
     * @param Role $role
     * @param string $name
     * @param string $guardName
     * @param array|null $permissions
     */
    public function __construct(
        Role $role,
        string $name,
        string $guardName,
        ?array $permissions
    ) {
        $this->role = $role;
        $this->name = $name;
        $this->guardName = $guardName;
        $this->permissions = $permissions;
    }

    /**
     * @param Request|UpdateRoleRequest $request
     * @param Role $role
     * @return self
     */
    public static function fromRequest(Request $request, Role $role): self
    {
        return (new self(
            $role,
            $request->name,
            $request->guardName,
            $request->permissions
        ));
    }

    /**
     * @return Role
     */
    public function role(): Role
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function guardName(): string
    {
        return $this->guardName;
    }

    /**
     * @return array|null
     */
    public function permissions(): ?array
    {
        return $this->permissions;
    }
}
