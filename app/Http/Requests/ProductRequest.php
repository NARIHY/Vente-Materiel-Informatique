<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', Rule::unique(Product::class)->ignore($this->id)],
            'Description' => ['required', 'min:3'],
            'Price' => ['required', 'numeric', 'min:0'],
            'quantityInStock' => ['required', 'numeric', 'min:1'], // Changement ici
            'categoryId' => ['required', 'exists:categories,name'],
            'picture' => ['image', 'max:10000']
        ];

    }
}
