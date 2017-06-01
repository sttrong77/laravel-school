<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;
use App\Http\Requests\ModuleStoreUpdatetRequest;
use Gate;

class ModuleController extends Controller
{

    private $module;
    private $totalPage = 10;

    public function __construct(Module $module){
      $this->module = $module;
    }

    public function byCourseId($id){
      $course = Course::find($id);

      if(Gate::denies('owner-course',$course))
        return redirect()->back();

      $modules = ($course->modules()->paginate($this->totalPage));

      $title = "Módulos do Curso: {$course->name}";

      return view('school.teacher.courses.modules', compact('course','modules','title'));
    }

    public function create()
    {
      $courses = Course::userByAuth()->pluck('name','id');//pega os cursos que o professor fez

      $title='Cadastrar novo Módulo';
      return view('school.teacher.courses.module-create',compact('title','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleStoreUpdatetRequest $request)
    {
      $dataForm = $request->all();
      $insert = $this->module->create($dataForm);

      if($insert)
        return redirect()->route('course.modules',$insert->course_id);
      else
        return redirect()->back()->with('errors','Falha ao cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $courses = Course::userByAuth()->pluck('name','id');//pega os cursos que o professor fez
      $module = $this->module->find($id);
      $title  = "Editar Módulo: {$module->name}";

      return view('school.teacher.courses.module-edit', compact('module','title','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleStoreUpdatetRequest $request, $id)
    {
      $module = $this->module->find($id);

      $dataForm = $request->all();

      $update = $module->update($dataForm);

      if($update)
        return redirect()->route('course.modules',$dataForm['course_id']);
      else
        return redirect()->back()->with('errors','Falha ao atualizar dados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $module =  $this->module->find($id);

      $course = $module->course;

      $this->authorize('owner-course',$course);

      $lessons = $module->lessons()->count();

      if($lessons == 0 ){//se o curso tiver modulos
        $module->delete();
        return redirect()->route('course.modules', $course)->with('success','Módulo deletado com sucesso');
      }
        return redirect()->back()->with('error','Delete as aulas deste módulo primeiramente');

    }
}
