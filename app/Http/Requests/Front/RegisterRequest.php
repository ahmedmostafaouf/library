<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|string',
            'phone'=>'required|unique:users,phone',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',
            'dop'=>'required|date',
            'address'=>'required|string',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'This Field is required',
            'unique'=>'This field found in database',
            'email'=>'Must be Email',
            'confirmed'=>'Password not confirmed', 'dop'=>'required|date',
        ];
    }
}
