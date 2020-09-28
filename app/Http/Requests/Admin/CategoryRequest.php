<?php

namespace App\Http\Requests\Admin;

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
        return [
            'name'=>'required|string|min:4'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Must be enter name',
            'name.string'=>'Name Must be String',
            'name.min'=>'Name Must Be At Least 4 char',
        ];
    }
}
