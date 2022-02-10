<?php

namespace App\Http\Requests;

class YearModelRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'manufacturer_id' => 'required|exists:App\Models\Manufacturer,id',
            'year' => 'required',
            'model' => 'required',
            'rental_class_id' => 'required|exists:App\Models\RentalClass,id'
        ];
    }

}
