<?php

namespace Modules\Faq\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Faq\Transformers\FaqCategoryResource;

class FaqResource extends JsonResource
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
            "id" => $this->id,
            "category" => new FaqCategoryResource($this->whenLoaded('faq_category')),
            "question" => $this->question,
            "answer" => $this->answer,
        ];
    }
}
