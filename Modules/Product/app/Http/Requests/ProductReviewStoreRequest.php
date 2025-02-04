<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'uuid', 'exists:products,id',],
            'customer_id' => ['uuid', 'exists:customers,id',],
            'name' => ['string',],
            'title' => ['required', 'string',],
            'rating' => ['required', 'integer',],
            'comment'=> ['string',],
            'status'=> ['required', 'bool',],
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
