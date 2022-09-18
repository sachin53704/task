<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageMaterialRequest extends FormRequest
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
            "category_id" => "required",
            "material_id" => "required",
            "date" => "required",
            "quantity" => "required|numeric"
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please enter material name',
            'material_id.required' => 'This material already exists',
            'date.required' => 'Material name should be atleast 3 character',
            'quantity.required' => "Please enter only alpha numeric value",
            'quantity.numeric' => "Please enter opening balance"
        ];
    }
}
