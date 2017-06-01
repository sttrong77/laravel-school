<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Module;
use Gate;

class StoreUpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $module = Module::with('course')->find($this->get('module_id'));

      $course = $module->course;


        return Gate::allows('owner-course',$course);
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
