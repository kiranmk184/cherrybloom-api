<?php

namespace Modules\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeGroupStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:attribute_groups,name'],
            'position' => ['integer'],
            'is_user_defined' => ['boolean'],
            'attribute_family_id' => ['required', 'uuid', 'exists:attribute_families,id'],
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
