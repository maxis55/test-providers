<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Category
 *
 * @property string                $name
 * @property string                $slug
 * @property string                $content
 *
 * @property integer               $parent_id
 *
 * @property Category              $parent
 * @property Category[]|Collection $children
 *
 * @package App\Models
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'content', 'parent_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
