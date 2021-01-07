<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method paginate(int $int)
 * @method static create(array $data)
 * @method static findOrFail($category)
 * @method static find($category)
 */
class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
