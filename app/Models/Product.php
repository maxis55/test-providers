<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property string        $name
 * @property string        $slug
 * @property string        $content
 * @property double        $price
 *
 * @property integer       $category_id
 *
 * @property Category|null $category
 *
 * @package App\Models
 */
class Product extends Model
{
    protected $fillable = ['name', 'slug', 'content', 'category_id', 'price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function baskets()
    {
        return $this->belongsToMany(Basket::class);
    }
}
