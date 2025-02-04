<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'sku' => ['string', 'unique:products,sku',],
            'type' => ['string',],
            'additional' => ['json',],
            'attribute_family_id' => ['uuid', 'exists:attribute_families,id',],
            'parent_id' => ['uuid', 'exists:products,id',],
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
