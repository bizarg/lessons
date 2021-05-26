<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Article\Article;
use App\Domain\Room\Room;
use App\Domain\Skill\Skill;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App\Domain\User
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Article[] $articles
 * @property-read int|null $articles_count
 * @property-read Collection|Client[] $clients
 * @property-read int|null $clients_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|Skill[] $skills
 * @property-read int|null $skills_count
 * @method static Builder|User permission($permissions)
 * @method static Builder|User role($roles, $guard = null)
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;

    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'users.created_at'
    ];

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

//    /**
//     * @return BelongsToMany
//     */
//    public function articles(): BelongsToMany
//    {
//        return $this->belongsToMany(Article::class, 'author_id', 'id');
//    }

    /**
     * @return BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'skill_user', 'user_id', 'skill_id');
    }

    /**
     * @return BelongsToMany
     */
    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'room_user', 'user_id', 'room_id');
    }
}
