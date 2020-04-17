<?php

namespace App\Http\Controllers;

use App\Helpers\ProviderHelperContract;
use App\Models\Category;

class ApiController extends Controller
{

    private $provider;

    /**
     * ApiController constructor.
     *
     * @param ProviderHelperContract $provider
     */
    public function __construct(ProviderHelperContract $provider)
    {
        $this->provider = $provider;
    }


    public function getCategories()
    {
        return $this->provider->getCategories();
    }

    public function getCategory(Category $category)
    {
        return $this->provider->getCategoryInformation($category);
    }

}
