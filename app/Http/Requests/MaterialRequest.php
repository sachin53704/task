<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
        if ($this->id)
        {
            $rule = [
                'name' => "required|min:3|regex:/^[a-zA-Z0-9 ]+$/u|unique:materials,name,$this->id",
                'opening_balance' => "required"
            ];
        }
        else
        {
            $rule = [
                'name' => 'required|min:3|regex:/^[a-zA-Z0-9 ]+$/u|unique:materials',
                'opening_balance' => "required"
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter material name',
            'name.unique' => 'This material already exists',
            'name.min' => 'Material name should be atleast 3 character',
            'name.regex' => "Please enter only alpha numeric value",
            'opening_balance.required' => "Please enter opening balance"
        ];
    }
}
