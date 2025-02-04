<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlatProductStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'uuid', 'exists:products,id',],
            'parent_id' => ['uuid', 'exists:flat_products,id',],
            'sku' => ['required', 'string', 'unique:flat_products,sku',],
            'product_number' => ['string',],
            'name' => ['string',],
            'description' => ['string',],
            'short_description' => ['string',],
            'url_key' => ['string',],
            'new' => ['bool',],
            'featured' => ['bool',],
            'status' => ['bool',],
            'thumbnail' => ['string',],
            'price' => ['decimal:4',],
            'cost' => ['decimal:4',],
            'special_price' => ['decimal:4',],
            'special_price_from' => ['date',],
            'special_price_to' => ['date',],
            'color' => ['integer',],
            'color_label' => ['string',],
            'size' => ['integer',],
            'size_label' => ['string',],
            'weight' => ['decimal:4',],
            'width' => ['decimal:4',],
            'height' => ['decimal:4',],
            'depth' => ['decimal:4',],
            'locale' => ['string',],
            'channel' => ['string',],
            'min_price' => ['decimal:4',],
            'max_price' => ['decimal:4',],
            'meta_title' => ['string',],
            'meta_keywords' => ['string',],
            'meta_description' => ['string',],
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
