<?php

namespace App\Http\Requests\Admin;

use App\Models\Enum\CategoryStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'unique:categories,name', 'max:255', 'string'],
            'status' => ['required', 'string', Rule::in(array_keys(CategoryStatusEnum::getCategoryStatusMap()))],
        ];
    }
}
