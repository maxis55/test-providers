<?php

namespace App\Http\Controllers;

use App\Helpers\AnotherTestProviderHelper;
use App\Helpers\ProviderHelperContract;
use App\Http\Resources\OrderResource;
use App\Models\Category;
use App\Models\Order;

class ApiController extends Controller
{

    private $provider;
    private $order;

    /**
     * ApiController constructor.
     *
     * @param ProviderHelperContract $provider
     * @param Order                  $order
     */
    public function __construct(ProviderHelperContract $provider, Order $order)
    {
        $this->provider = $provider;
        $this->order    = $order;
        if ($provider instanceof AnotherTestProviderHelper) {
            $this->middleware('throttle:1000,1');
        }
    }


    public function getCategories()
    {
        return $this->provider->getCategories();
    }

    public function getCategory(Category $category)
    {
        return $this->provider->getCategoryInformation($category);
    }

    public function getOrder()
    {
        return new OrderResource($this->order);
    }
}
