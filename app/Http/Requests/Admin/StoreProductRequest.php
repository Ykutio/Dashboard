<?php

namespace App\Http\Requests\Admin;

use App\Models\Enum\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:brands,name', 'max:255', 'string'],
            'description' => ['required', 'string'],
            'img' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'price' => ['required', 'integer'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'cat_id' => ['nullable', 'integer', 'exists:categories,id'],
            'country_id' => ['nullable', 'integer', 'exists:countries,id'],
            'quantity' => ['nullable', 'integer'],
            'status' => ['required', 'string', Rule::in(array_keys(ProductStatusEnum::getProductStatusMap()))],
        ];
    }
}
