<?php

namespace Modules\Ad\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() === 'POST') {
            return [
                'title' => 'required|unique:ads,title',
                'price' => 'required|numeric',
                'model' => 'required',
                'condition' => 'required',
                'authenticity' => 'required',
                'negotiable' => 'sometimes',
                'featured' => 'sometimes',
                'category_id' => 'required',
                'subcategory_id' => 'sometimes',
                'brand_id' => 'required',
                'phone' => 'required',
                'phone_2' => 'sometimes',
                'city_id' => 'required',
                'town_id' => 'required',
                'description' => 'required',
                'thumbnail' => 'required',
                'customer_id' => "required",
            ];
        } else {
            return [
                'title' => "required|unique:ads,title,{$this->ad->id}",
                'price' => 'required|numeric',
                'model' => 'required',
                'condition' => 'required',
                'authenticity' => 'required',
                'negotiable' => 'sometimes',
                'featured' => 'sometimes',
                'category_id' => 'required',
                'subcategory_id' => 'sometimes',
                'brand_id' => 'required',
                'phone' => 'required',
                'phone_2' => 'sometimes',
                'city_id' => 'required',
                'town_id' => 'required',
                'description' => 'required',
                'customer_id' => "required",
            ];
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
