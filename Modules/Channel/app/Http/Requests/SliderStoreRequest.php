<?php

namespace Modules\Channel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string',],
            'path' => ['required', 'string',],
            'content' => ['string',],
            'channel_id' => ['required', 'uuid', 'exists:channels,id',],
            'slider_path' => ['string',],
            'locale' => ['required', 'string',],
            'position' => ['integer',],
            'expired_at' => ['date',],
            'sort_order' => ['required', 'integer',]
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
