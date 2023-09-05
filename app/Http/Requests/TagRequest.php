<?php

namespace App\Http\Requests;

use App\Models\Admin\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {

        $slug = (new Tag)->createSlug($this->name, $this->route('id'));
        $this->merge([
            'slug' => $slug
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'slug' => ['required', 'max:255', Rule::unique(Tag::class)->ignore($this->route('id'))],
        ];
    }
}
