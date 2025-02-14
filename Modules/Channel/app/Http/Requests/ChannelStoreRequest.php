<?php

namespace Modules\Channel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class ChannelStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'unique:channels,code'],
            'theme' => ['string'],
            'hostname' => ['string'],
            'logo' => ['required', File::types(['pgn', 'jpg'])->max(1024)],
            'favicon' => [File::types(['pgn', 'jpg'])->max(256)],
            'timezone' => ['timezone'],
            'is_maintenance_on' => ['bool'],
            'allowed_ips' => ['string'],
            'default_locale_id' => ['required', 'integer', 'exists:locales,id'],
            'base_currency_id' => ['required', 'uuid', 'exists:currencies,id'],
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
