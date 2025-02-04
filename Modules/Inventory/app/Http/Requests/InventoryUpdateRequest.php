<?php

namespace Modules\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['string', 'unique:inventories,code',],
            'name' => ['string', 'unique:inventories,name',],
            'description' => ['string',],
            'contact_name' => ['string', 'unique:inventories,contact_name',],
            'contact_email' => ['string', 'unique:inventories,contact_email',],
            'contact_number' => ['string', 'unique:inventories,contact_number',],
            'contact_fax' => ['string'],
            'country' => ['string',],
            'state' => ['string',],
            'city' => ['string',],
            'street' => ['string',],
            'postal_code' => ['string',],
            'priority' => ['integer',],
            'latitude' => ['decimal:4',],
            'longitude' => ['decimal:4',],
            'status' => ['bool',],
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
