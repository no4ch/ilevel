<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class DestroyCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => ['nullable', 'numeric', 'min:-1', 'exists:products,id'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
