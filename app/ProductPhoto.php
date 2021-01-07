<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $photoName)
 */
class ProductPhoto extends Model
{
    protected $fillable = ['image'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
