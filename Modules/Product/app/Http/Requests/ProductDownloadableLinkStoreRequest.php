<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDownloadableLinkStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'uuid', 'exists:products,id',],
            'url' => ['string',],
            'file ' => ['string',],
            'file_name'=> ['string',],
            'type'=> ['required','string',],
            'price' => ['required', 'decimal:4',],
            'sample_url' => ['string',],
            'sample_file' => ['string',],
            'sample_file_name' => ['string',],
            'sample_type' => ['string',],
            'downloads' => ['required', 'integer',],
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
