<?php

namespace App\Http\Requests\Admin\Country;

use App\Models\Country\Enum\CountryStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCountryRequest extends FormRequest
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
            'name' => ['required', 'unique:countries,name', 'max:255', 'string'],
            'status' => ['required', 'string', Rule::in(array_keys(CountryStatusEnum::getCountryStatusMap()))],
        ];
    }
}
