<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDownloadableLinkUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['uuid', 'exists:products,id',],
            'url' => ['string',],
            'file ' => ['string',],
            'file_name' => ['string',],
            'type' => ['string',],
            'price' => ['decimal:4',],
            'sample_url' => ['string',],
            'sample_file' => ['string',],
            'sample_file_name' => ['string',],
            'sample_type' => ['string',],
            'downloads' => ['integer',],
            'sort_order' => ['integer',],
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
