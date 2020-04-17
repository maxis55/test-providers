<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Basket
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
        $category_ids = [];
        $this->products()->each(function ($product) use (&$category_ids) {
            $category_ids[] = $product->category_id;
        });

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
