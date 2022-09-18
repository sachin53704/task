<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name' => "required|min:3|regex:/^[a-zA-Z0-9 ]+$/u|unique:category,name,$this->id",
            ];
        }
        else
        {
            $rule = [
                'name' => 'required|min:3|regex:/^[a-zA-Z0-9 ]+$/u|unique:category'
            ];
        }
        return $rule;
    }



    public function messages()
    {
        return [
            'name.required' => 'Please enter category name',
            'name.unique' => 'This category already exists',
            'name.min' => 'Category should be atleast 3 character',
            'name.regex' => "Please enter only alpha numeric value",
        ];
    }
}
