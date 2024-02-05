<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsEntryRequest extends FormRequest
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
        return [
            'product_id' => "required",
            'quantity' => "required",
            'unity_price' => "required"
        ];
    }
    
    public function messages()
    {
        return [
            'product_id.required' => 'É necesário selecionar um produto.',
            'quantity.required' => 'O campo quantidade é obrigatório.',
            'unity_price.required' => 'O campo preço do produto é obrigatório.',
        ];
    }
}
