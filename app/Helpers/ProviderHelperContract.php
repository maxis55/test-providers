<?php

namespace App\Helpers;

use App\Models\Category;

interface ProviderHelperContract
{
    /**
     * @return array
     */
    public function getCategories();

    /**
     * @param Category $category
     *
     * @return  array
     */
    public function getCategoryInformation(Category $category);
}
