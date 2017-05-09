<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        $id = $this->segment(2); //pega id do curso

        return [
          'category_id'=>'required',
          'name'=>'required|min:3|max:150',
          'url'=>"required|min:3|max:20|unique:courses,url,{$id},id",
          'description'=>'required|min:3|max:2000',
          'image'=>'image',
          'code'=>"required|integer|unique:courses,code,{$id},id",
          'total_hours'=>'required',
          'price'=>'required',
          'price_plots'=>'required',
          'total_plots'=>'required|integer',
          'link_buy'=>'required|max:255',
        ];
    }
}
