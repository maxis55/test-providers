<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryTreeResource extends JsonResource
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
        $arr = parent::toArray($request);

        if ($this->children) {
            $arr['children']
                = CategoryTreeResource::collection($this->children);
        }

        return $arr;
    }
}
