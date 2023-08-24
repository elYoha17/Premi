<?php

namespace App\Http\Requests;

use App\Enums\Shelf;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreProductRequest extends FormRequest
{
    protected $errorBag = 'productCreation';
    
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
            'shelf' => ['required', new Enum(Shelf::class)],
            'name' => ['required', 'regex:/^\w[\w&\s\'\+\-]*$/u', Rule::unique(Product::class)->where(fn ($query) => $query->where('shelf', $this->input('shelf')))],
            'default_price' => ['nullable', 'numeric', 'min:0', 'digits_between:1,18'],
            'launched_at' => ['required', 'date'],
        ];
    }
}
