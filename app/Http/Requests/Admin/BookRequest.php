<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name'=>'required|string|min:4',
            'photo'=>'required_without:id|mimes:jpg,png,jpeg',
            'description'=>'required|min:10',
            'title'=>"required|string",
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'This field is required',
            'string'=>'This Field Must be string',
            'min'=>'This Field Must Be At Least 4 char',
            'photo.mimes'=>'Photo must be JPG Or PNG Or JPEG',
        ];
    }
}
