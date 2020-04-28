<?php

declare(strict_types=1);

namespace Api\Domain\Project;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package Api\Domain\Project
 */
class Project extends Model
{
    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'projects.created_at'
    ];

    /** @var string */
    protected $table = 'projects';
}
