<?php

namespace App\Http\Requests\Admin\Product;

use App\Models\Enum\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProductListRequest extends FormRequest
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
            'brand_id' => ['sometimes', 'nullable', 'integer', 'exists:brands,id'],
            'cat_id' => ['sometimes', 'nullable', 'integer', 'exists:categories,id'],
            'country_id' => ['sometimes', 'nullable', 'integer', 'exists:countries,id'],
            'status' => ['sometimes', 'nullable', 'string', Rule::in(array_keys(ProductStatusEnum::getProductStatusMap()))],
        ];
    }
}
