<?php

namespace App\Http\Requests;

class RentalClassRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'name' => 'required:unique:App\Models\RentalClass',
            'description' => 'required',
            'daily_rate' => 'required|numeric',
            'weekly_rate' => 'required|numeric',
            'monthly_rate' => 'required|numeric',
        ];
    }
}
