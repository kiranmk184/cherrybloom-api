<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDownloadableLinkTranslationStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_dl_lk_id' => ['required', 'uuid', 'exists:product_downloadable_links,id',],
            'locale' => ['required', 'string',],
            'title' => ['required', 'string',],
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
