<?php

declare(strict_types=1);

namespace App\Application\Skill\UpdateSkill;

use App\Domain\Skill\Skill;
use App\Http\Requests\Skill\UpdateSkillRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateSkill
 * @package App\Application\Skill\UpdateSkill
 */
class UpdateSkill implements Command
{
    /**
     * @var Skill
     */
    private Skill $skill;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * UpdateSkill constructor.
     * @param Skill $skill
     * @param string $title
     * @param string|null $description
     */
    public function __construct(
        Skill $skill,
        string $title,
        ?string $description
    ) {
        $this->skill = $skill;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @param Request|UpdateSkillRequest $request
     * @param Skill $skill
     * @return self
     */
    public static function fromRequest(Request $request, Skill $skill): self
    {
        return (new self(
            $skill,
            $request->title,
            $request->description
        ));
    }

    /**
     * @return Skill
     */
    public function skill(): Skill
    {
        return $this->skill;
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
