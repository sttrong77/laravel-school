<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use App\Models\Course;

class ModuleStoreUpdatetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $course = Course::find($this->get('course_id'));//pega o id do curso

        // $this->authorize('owner-course',$course);

        return Gate::allows('owner-course', $course);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id'       =>'required',
            'name'            =>'required|min:3|max:100',
            'description'     =>'required|min:3|max:255'
        ];
    }
}
