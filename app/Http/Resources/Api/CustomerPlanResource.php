<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ad_limit' => $this->ad_limit,
            'featured_limit' => $this->featured_limit,
            'customer_support' => $this->customer_support,
            'multiple_image' => $this->multiple_image,
            'badge' => $this->badge,
        ];
    }
}
