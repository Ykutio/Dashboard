<?php

namespace App\Http\Requests\Admin\Product;

use App\Models\Product\Enum\ProductStatusEnum;
use App\Services\Product\DTO\ProductDTO;
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
            'brand_id' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'category_id' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'country_id' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'status' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(array_keys(ProductStatusEnum::getProductStatusMap()))
            ],
            'search' => ['sometimes', 'nullable', 'string', 'min:3', 'max:20']
        ];
    }

    public function getDTO(): ProductDTO
    {
        return new ProductDTO(
            $this->input('brand_id'),
            $this->input('category_id'),
            $this->input('country_id'),
            $this->input('status'),
            $this->input('search')
        );
    }
}
