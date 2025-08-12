<?php

namespace App\Http\Requests\Admin;

use App\Models\Enum\BrandStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBrandRequest extends FormRequest
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
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'status' => ['required', 'string', Rule::in(array_keys(BrandStatusEnum::getBrandStatusMap()))],
        ];
    }
}
