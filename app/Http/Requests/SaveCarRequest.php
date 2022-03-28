<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCarRequest extends FormRequest
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
        return [
            'car_manufacturer' => 'required',
            'car_model' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'car_model.required' => 'Model is required',
            'car_manufacturer.required' => 'Manufacturer is required',
        ];
    }
}
