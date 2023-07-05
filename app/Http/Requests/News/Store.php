<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:200'],
            'previewText' => ['required', 'string', 'min:10', 'max:1000'],
            'detailText' => ['required', 'string', 'min:10', 'max:1000'],
            'status' => ['nullable', 'boolean'],
            'category' => ['required', 'integer'],
            'source' => ['required', 'integer']
        ];
    }
}
