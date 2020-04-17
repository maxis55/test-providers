<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Basket
 *
 * @property Order|null            $order
 *
 * @property Collection|Category[] $categories
 * @property Collection|Product[]  $products
 *
 *
 * @package App\Models
 */
class Basket extends Model
{

    protected $fillable = ['order_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getCategoriesAttribute()
    {
        $category_ids = $this->products()->pluck('category_id');

        return Category::whereIn('id', $category_ids)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
