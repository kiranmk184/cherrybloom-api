<?php

namespace Modules\Channel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CMSPageTranslationUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'cms_page_id' => ['uuid','exists:cms_pages,id'],
            'page_title'=> ['string',],
            'url_key'=> ['url',],
            'html_content'=> ['string',],
            'meta_title' => ['string'],
            'meta_description' => ['string'],
            'meta_keywords' => ['string'],
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
