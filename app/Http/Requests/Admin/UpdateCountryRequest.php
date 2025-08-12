<?php

namespace App\Http\Requests\Admin;

use App\Models\Enum\CountryStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
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
            'status' => ['required', 'string', Rule::in(array_keys(CountryStatusEnum::getCountryStatusMap()))],
        ];
    }
}
