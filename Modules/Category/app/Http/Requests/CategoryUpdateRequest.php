<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['exists:categories,id'],
            'position' => ['integer'],
            'name' => ['string', 'unique:categories,name'],
            'slug' => ['string', 'unique:categories,slug'],
            'display_mode' => ['string'],
            'description' => ['string'],
            'category_icon' => [File::types(['png', 'jpg'])->max(256)],
            'status' => ['boolean'],
            'additional' => ['json']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
