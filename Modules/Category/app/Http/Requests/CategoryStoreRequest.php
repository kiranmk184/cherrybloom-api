<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['exists:categories,id'],
            'position' => ['required','integer'],
            'name' => ['string', 'unique:categories,name'],
            'slug' => ['string', 'unique:categories,slug'],
            'display_mode' => ['string'],
            'description' => ['string'],
            'category_icon' => ['string'],
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
