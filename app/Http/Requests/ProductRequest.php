<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => ['required', 'string', 'max:50'],
        'description' => ['nullable', 'string', 'max:50'],
        'category'  => ['nullable', 'string', 'max:50'],
        'buying_price'=> ['nullable', 'numeric'] ,
        'selling_price'=> ['nullable', 'numeric'],
        'quantity'=> ['nullable', 'numeric'],
        'accounts_receivable'=> ['nullable', 'string', 'max:50'],
        'sales_account'=> ['nullable', 'string', 'max:50'],
        'inventory_account'=> ['nullable', 'string', 'max:50'],
        'COGS_account'=> ['nullable', 'string', 'max:50'],
        'sales_returns_account'=> ['nullable', 'string', 'max:50'],
        'purchase_returns_account'=> ['nullable', 'string', 'max:50'],
        ];
    }
}
