<?php

namespace Modules\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeGroupUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'unique:attribute_groups,name'],
            'position' => ['integer'],
            'is_user_defined' => ['boolean'],
            'attribute_family_id' => ['uuid', 'exists:attribute_families,id'],
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
