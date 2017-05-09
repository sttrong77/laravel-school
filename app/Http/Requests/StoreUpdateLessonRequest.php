<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLessonRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
          'name' => 'required|min:3|max:100',
          'module_id' => 'required',
          'url' => "required|min:3|max:20|unique:lessons,url,{$id},id",
          'description' => 'required|min:3|max:2000',
          'video' => 'required|min:3|max:100'
        ];
    }
}
