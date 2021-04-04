<?php

declare(strict_types=1);

namespace App\Application\Permission\UpdatePermission;

use App\Domain\Permission\Permission;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdatePermission
 * @package App\Application\Permission\UpdatePermission
 */
class UpdatePermission implements Command
{
    /**
     * @var Permission
     */
    private Permission $permission;
    private string $name;
    private string $guardName;

    /**
     * UpdatePermission constructor.
     * @param Permission $permission
     * @param string $name
     * @param string $guardName
     */
    public function __construct(
        Permission $permission,
        string $name,
        string $guardName
    ) {
        $this->permission = $permission;
        $this->name = $name;
        $this->guardName = $guardName;
    }

    /**
     * @param Request|UpdatePermissionRequest $request
     * @param Permission $permission
     * @return self
     */
    public static function fromRequest(Request $request, Permission $permission): self
    {
        return (new self(
            $permission,
            $request->name,
            $request->guardName
        ));
    }

    /**
     * @return Permission
     */
    public function permission(): Permission
    {
        return $this->permission;
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
}
