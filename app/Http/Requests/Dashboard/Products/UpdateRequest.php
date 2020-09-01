<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'description' => ['nullable', 'string', 'min:1', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['nullable', 'numeric', 'min:-1'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
