<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @method paginate(int $int)
 * @method static create(array $data)
 * @method static findOrFail($category)
 * @method static find($category)
 * @method static whereSlug($slug)
 * @method static limit()
 */
class Category extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
