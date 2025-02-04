<?php

namespace Modules\Channel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'unique:channels,code'],
            'name' => ['string'],
            'description' => ['string'],
            'hostname' => ['string'],
            'logo' => ['string'],
            'favicon' => ['string'],
            'timezone' => ['string'],
            'default_locale_id' => ['string'],
            'is_maintenance_on' => ['bool'],
            'root_category_id' => ['required', 'uuid', 'exists:categories,id'],
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
