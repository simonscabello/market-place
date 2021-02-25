<?php

namespace App;

use App\Notifications\StoreReceiveNewOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @method static paginate(int $int)
 * @method static find($store)
 * @method static limit(int $int)
 * @method static whereSlug($slug)
 * @method static whereIn(string $string, $stores)
 */
class Store extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

//    public function categories(): HasMany
//    {
//        return $this->hasMany(Category::class);
//    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(
            UserOrder::class,
            'order_store',
            'store_id',
            'order_id');
    }

    public function notifyStoresOwners(array $storesId = [])
    {
        $stores = Store::whereIn('id', $storesId)->get();

        $stores->map(function($store){
            return $store->user;
        })->each->notify(new StoreReceiveNewOrder());
    }
}
