<?php

namespace Modules\Currency\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyUpdateFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|unique:currencies,name,{$this->currency->id}",
            'code' => "required|unique:currencies,code,{$this->currency->id}",
            'symbol' => "required|unique:currencies,symbol,{$this->currency->id}",
            'symbol_position' => 'required',
        ];
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
