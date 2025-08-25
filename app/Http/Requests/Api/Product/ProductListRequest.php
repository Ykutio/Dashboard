<?php

namespace App\Http\Requests\Api\Product;

use App\Constants\SortDirection;
use App\Models\Product\Enum\ProductSortOrderEnum;
use App\Models\Product\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'per_page' => ['sometimes', 'nullable', 'integer', 'min:1', 'max:' . Product::PER_PAGE],
            'offset' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'sort_field' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(ProductSortOrderEnum::getSortOrderMap())
            ],
            'sort_direction' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(SortDirection::getSortOrderMap())
            ],
        ];
    }
}
