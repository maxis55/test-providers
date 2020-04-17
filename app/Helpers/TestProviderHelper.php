<?php


namespace App\Helpers;


use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Collection;

class TestProviderHelper implements ProviderHelperContract
{

    /**
     * @return array
     */
    public function getCategories()
    {
        $categories = Category::whereDoesntHave('parent')->get();

        return $this->categoryTree($categories);

        //or Resource
//        return CategoryTreeResource::collection($categories);
    }

    /**
     * @param Category[]|Collection $categories
     *
     * @return array
     */
    private function categoryTree($categories)
    {
        $output_arr = [];
        foreach ($categories as $key => $category) {
            $arr = $category->toArray();
            if ($category->children) {
                $arr['children'] = $this->categoryTree($category->children);
            }
            $output_arr[] = $arr;
        }

        return $output_arr;
    }

    /**
     * @param Category $category
     *
     * @return CategoryResource
     */
    public function getCategoryInformation(Category $category)
    {
        //either way, depending on complexity of transformation
//        return $category->toArray();
        return new CategoryResource($category);
    }

}
