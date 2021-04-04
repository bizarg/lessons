<?php

declare(strict_types=1);

namespace App\Application\Permission\StorePermission;

use App\Http\Requests\Permission\StorePermissionRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class StorePermission
 * @package App\Application\Permission
 */
class StorePermission implements Command
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
     * StorePermission constructor.
     * @param string $name
     * @param string $guardName
     */
    public function __construct(
        string $name,
        string $guardName
    ) {
        $this->name = $name;
        $this->guardName = $guardName;
    }

    /**
     * @param Request|StorePermissionRequest $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self(
            $request->name,
            $request->guardName
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
}
