<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PostRequest extends FormRequest
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
            'title'       => 'required|max:255',
            'body'        => 'required',
            'category_id' => 'required|integer',
            'cover_image' => ['nullable', 'mimes:jpeg,jpg,jpe,png', 'between:1, 2024'],
        ];
    }
}
