<?php


namespace App\Helpers;


use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCategoryInformation(Category $category)
    {
        return ProductResource::collection($category->products);
    }
}
