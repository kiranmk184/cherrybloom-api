<?php

namespace Modules\Locale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Locale\Enum\DirectionEnum;

class LocaleUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'unique:locales,name',],
            'namcodee' => ['string', 'unique:locales,code',],
            'direction' => [Rule::enum(DirectionEnum::class)],
            'locale_img' => ['required', 'string',],
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
