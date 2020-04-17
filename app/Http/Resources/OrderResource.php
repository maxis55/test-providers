<?php

namespace App\Http\Resources;

use App\Http\Resources\Order\BasketResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
        $arr            = parent::toArray($request);
        $arr['baskets'] = BasketResource::collection($this->baskets);

        return $arr;
    }
}
