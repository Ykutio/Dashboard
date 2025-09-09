<?php

namespace App\Http\Requests\Admin\Brand;

use App\Models\Brand\Enum\BrandStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandListRequest extends FormRequest
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
            'country_id' => ['sometimes', 'nullable', 'integer', 'exists:countries,id'],
            'status'     => ['sometimes', 'nullable', 'string', Rule::in(array_keys(BrandStatusEnum::getBrandStatusMap()))],
        ];
    }
}
