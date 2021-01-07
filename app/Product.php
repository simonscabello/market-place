<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(int $int)
 * @method static find($id)
 */
class Product extends Model
{
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
