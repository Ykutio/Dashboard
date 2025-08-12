<?php

namespace App\Http\Requests\Admin;

use App\Models\Enum\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'string'],
            'img' => ['nullable', 'max:2048'],
            'price' => ['required', 'integer'],
            'brand_id' => ['nullable', 'integer'],
            'cat_id' => ['nullable', 'integer'],
            'country_id' => ['nullable', 'integer'],
            'quantity' => ['nullable', 'integer'],
            'status' => ['required', 'string', Rule::in(array_keys(ProductStatusEnum::getProductStatusMap()))],
        ];
    }
}
