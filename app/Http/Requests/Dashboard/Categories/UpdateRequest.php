<?php

namespace App\Http\Requests\Dashboard\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'description' => ['nullable', 'string', 'min:1', 'max:255'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
