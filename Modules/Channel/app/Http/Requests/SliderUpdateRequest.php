<?php

namespace Modules\Channel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['string',],
            'path' => ['string',],
            'content' => ['string',],
            'channel_id' => ['uuid', 'exists:channels,id',],
            'slider_path' => ['string',],
            'locale' => ['string',],
            'position' => ['integer',],
            'expired_at' => ['date',],
            'sort_order' => ['integer',]
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
