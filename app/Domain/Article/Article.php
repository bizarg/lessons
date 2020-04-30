<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\User\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

/**
 * Class Article
 *
 * @package App\Domain\Article
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $author_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read User $author
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @method static Builder|Article whereAuthorId($value)
 * @method static Builder|Article whereBody($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereDeletedAt($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereSlug($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Article extends Model
{
    use HasSlug;
    use HasTranslations;

    /** @var array */
    public const ALLOWED_SORT_FIELDS = [
        'createdAt' => 'articles.created_at'
    ];

    /** @var string */
    protected $table = 'articles';
    /** @var array */
    public array $translatable = ['title', 'body'];

    /**
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function () {
                return $this->title;
            })
            ->usingLanguage('en')
            ->usingSeparator('_')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }
}
