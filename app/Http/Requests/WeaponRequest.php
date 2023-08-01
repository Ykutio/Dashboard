<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeaponRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules[ 'name' ] = 'required';
        $rules[ 'type' ] = 'required';
        $rules[ 'description' ] = 'required';
//        $rules[ 'model' ] = 'required|numeric|gt:0';//???
        $rules[ 'tacktical_descr' ] = 'required';
        $rules[ 'country' ] = 'required';
        $rules[ 'price' ] = 'required';
        $rules[ 'quantity' ] = 'required';

        $data = $this->validationData();
        
        $method = $this->method();//POST || PUT

        //update -> PUT 
        if ( $method ===  "PUT"  )
        {
            if ( isset( $data[ 'fileuploader-list-file' ] ) && !empty( $data[ 'fileuploader-list-file' ] ) )
            {
                $rules[ 'file.*' ] = 'required|mimes:jpeg,jpg,png|max:1024';
            }
        } else
        {
            $rules[ 'file.*' ] = 'required|mimes:jpeg,jpg,png|max:1024';
            $rules[ 'fileuploader-list-file' ] = 'required';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fileuploader-list-file.required' => 'Фото не выбрано',
            'name.required' => 'Имя не выбрано',
            'type.required' => 'Тип не выбран',
            'description.required' => 'Описание не выбрано',
            'tacktical_descr.required' => 'Тех.описание не выбрано',
            'country.required' => 'Страна не выбрана',
            'price.required' => 'Цена не выбрана',
            'price.quantity' => 'Колличество не выбрано',
        ];
    }

}
