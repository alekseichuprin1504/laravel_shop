<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3',
            'slug' => 'required',
            'code' => 'required',
            'price' => 'required | numeric | min:1',
            'count' => 'required | numeric'
        ];
        if($this->route()->named('products.store')){
            $rules['code'] .= '|unique:products,code';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'name.min' => 'Поле имя должно содержать не менее :min символов',
            'unique' => 'Поле :attribute должно быть уникальным'
        ];
    }
}
