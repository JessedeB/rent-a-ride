<?php

namespace App\Http\Requests;

class ColorRequest
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
            'name' => 'required',
            'hex_code' => 'required|alpha_num|size:6',
        ];
    }
}
