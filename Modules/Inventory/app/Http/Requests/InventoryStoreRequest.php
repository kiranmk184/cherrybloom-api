<?php

namespace Modules\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'unique:inventories,code',],
            'name' => ['required', 'string', 'unique:inventories,name',],
            'description' => ['string',],
            'contact_name' => ['required', 'string', 'unique:inventories,contact_name',],
            'contact_email' => ['required', 'string', 'unique:inventories,contact_email',],
            'contact_number' => ['required', 'string', 'unique:inventories,contact_number',],
            'contact_fax' => ['string'],
            'country' => ['required', 'string',],
            'state' => ['required', 'string',],
            'city' => ['required', 'string',],
            'street' => ['required', 'string',],
            'postal_code' => ['required', 'string',],
            'priority' => ['required', 'integer',],
            'latitude' => ['decimal:4',],
            'longitude' => ['decimal:4',],
            'status' => ['required', 'bool',],
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
