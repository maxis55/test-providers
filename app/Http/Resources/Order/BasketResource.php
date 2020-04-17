<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $arr               = parent::toArray($request);
        $arr['categories'] = $this->categories;
        $arr['products']   = $this->products;

        return $arr;
    }
}
