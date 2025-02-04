<?php

namespace Modules\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['string', 'unique:attributes,code'],
            'admin_name' => ['string', 'unique:attributes,admin_name'],
            'type' => ['string'],
            'validation' => ['string'],
            'position' => ['integer'],
            'is_required' => ['boolean'],
            'is_unique' => ['boolean'],
            'value_per_locale' => ['boolean'],
            'value_per_channel' => ['boolean'],
            'is_filterable' => ['boolean'],
            'is_configurable' => ['boolean'],
            'is_user_defined' => ['boolean'],
            'is_visible_on_front' => ['boolean'],
            'swatch_type' => ['string'],
            'use_in_flat' => ['boolean'],
            'is_comparable' => ['boolean'],
            'enable_wysiwyg' => ['boolean'],
            'attribute_group_id' => ['uuid', 'exists:attribute_groups,id'],
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
