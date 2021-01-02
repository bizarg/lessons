<?php

declare(strict_types=1);

namespace App\Application\Skill\StoreSkill;

use App\Http\Requests\Skill\StoreSkillRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class StoreSkill
 * @package App\Application\Skill
 */
class StoreSkill implements Command
{
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * StoreSkill constructor.
     * @param string $title
     * @param string|null $description
     */
    public function __construct(
        string $title,
        ?string $description
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @param Request|StoreSkillRequest $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return (new self(
            $request->title,
            $request->description
        ));
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }
}
