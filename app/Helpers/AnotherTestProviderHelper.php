<?php


namespace App\Helpers;


use App\Http\Resources\CategoryResource;
use App\Models\Category;

class AnotherTestProviderHelper implements ProviderHelperContract
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCategories()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }

    /**
     * @param Category $category
     *
     * @return \App\Models\Product[]|\Illuminate\Support\Collection
     */
    public function getCategoryInformation(Category $category)
    {
        return $category->products;
    }
}
