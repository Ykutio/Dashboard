<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category\Enum\CategoryStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryListRequest extends FormRequest
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
            'status' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(array_keys(CategoryStatusEnum::getCategoryStatusMap()))
            ],
        ];
    }
}
