<?php

namespace App\Http\Requests\Api\Product;

use App\Constants\SortDirection;
use App\Models\Product\Enum\ProductSortOrderEnum;
use App\Models\Product\Product;
use App\Services\Product\DTO\ProductApiDTO;
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
            'perPage' => ['sometimes', 'nullable', 'integer', 'min:1', 'max:' . Product::PER_PAGE],
            'offset' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'sortField' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(ProductSortOrderEnum::getSortOrderMap())
            ],
            'sortDirection' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(SortDirection::getSortOrderMap())
            ],
        ];
    }

    public function getApiDTO(): ProductApiDTO
    {
        return new ProductApiDTO(
            $this->input('perPage', Product::PER_PAGE),
            $this->input('offset', 0),
            $this->input('sortField', ProductSortOrderEnum::ID),
            $this->input('sortDirection', SortDirection::ASC)
        );
    }
}
