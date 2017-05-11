<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
          'name'        =>'required|min:3|max:100',
          'email'       =>'required|min:3|max:100|email|unique:users',
          'url'       =>'required|min:3|max:20|unique:users',
          'password'    =>'required|min:6|max:15|confirmed',
          'image'       =>'image',
          'token'       =>'max:250',
          'bibliography'=>'max:1000',

        ];
    }
}
