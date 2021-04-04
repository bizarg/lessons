<?php

declare(strict_types=1);

namespace App\Application\Role\StoreRole;

use App\Http\Requests\Role\StoreRoleRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class StoreRole
 * @package App\Application\Role
 */
class StoreRole implements Command
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $guardName;
    /**
     * @var array|null
     */
    private ?array $permissions;

    /**
     * StoreRole constructor.
     * @param string $name
     * @param string $guardName
     * @param array|null $permissions
     */
    public function __construct(
        string $name,
        string $guardName,
        ?array $permissions
    ) {
        $this->name = $name;
        $this->guardName = $guardName;
        $this->permissions = $permissions;
    }

    /**
     * @param Request|StoreRoleRequest $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self(
            $request->name,
            $request->guardName,
            $request->permissions
        ));
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
