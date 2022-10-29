<?php

namespace Modules\Ad\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Category\Transformers\CategoryResourceMobile;
use Modules\Location\Transformers\CityResource;

class AdResourceMobile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'thumbnail' => $this->thumbnail,
            'price' => $this->price,
            'status' => $this->status,
            'city' => new CityResource($this->whenLoaded('city')),
            'category' => new CategoryResourceMobile($this->whenLoaded('category')),
            'created_at' => $this->created_at->format('M d, Y'),
        ];
    }
}
