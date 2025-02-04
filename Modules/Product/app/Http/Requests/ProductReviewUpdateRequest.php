<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['uuid', 'exists:products,id',],
            'customer_id' => ['uuid', 'exists:customers,id',],
            'name' => ['string',],
            'title' => ['string',],
            'rating' => ['integer',],
            'comment'=> ['string',],
            'status'=> ['bool',],
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
