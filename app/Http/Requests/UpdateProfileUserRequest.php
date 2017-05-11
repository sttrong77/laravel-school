<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
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
        $id = auth()->user()->id;//id do user logado no momento
        return [
          'name'        =>'required|min:3|max:100',
          'email'       =>"required|min:3|max:100|email|unique:users,email,{$id},id",
          'url'       =>"required|min:3|max:20|unique:users,url,{$id},id",
          'password'    =>'max:15|confirmed',
          'image'       =>'image',
          'token'       =>'max:250',
          'bibliography'=>'max:1000',
        ];
    }
}
