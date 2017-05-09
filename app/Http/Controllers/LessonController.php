<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Lesson;
use App\Http\Requests\StoreUpdateLessonRequest;

class LessonController extends Controller
{

    private $totalPage = 30;
    private $lesson;

    public function __construct(Lesson $lesson){
      $this->lesson = $lesson;
    }

    public function byModuleId($id)
    {
      $module = Module::find($id);
      $lessons = $module->lessons()->paginate($this->totalPage);

      $title = "Aulas do Módulo {$module->name}";

      return view('school.teacher.courses.lessons.lessons',compact('module','lessons','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Cadastrando nova aula";

      $modules = Module::pluck('name','id');

      return view('school.teacher.courses.lessons.create-edit',compact('title','modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLessonRequest $request)
    {
      $dataForm = $request->all();

      $dataForm['free'] = isset($dataForm['free']);

      $insert = $this->lesson->create($dataForm);

      if($insert)
        return redirect()->route('module.lessons',$insert->module_id);
      else
        return redirect()->back()->with('error','Falha ao cadastrar');
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
      $lesson = $this->lesson->find($id);

      $title = "Editar Aula {$lesson->name}";

      $modules = Module::pluck('name','id');

      return view('school.teacher.courses.lessons.create-edit',compact('lesson','title','modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLessonRequest $request, $id)
    {
      $dataForm = $request->all();
      $lesson = $this->lesson->find($id);

      $dataForm['free'] = isset($dataForm['free']);

      $update = $lesson->update($dataForm);

      if($update)
        return redirect()->route('module.lessons',$dataForm['module_id']);
      else
        return redirect()->back()->with(['errors'=>'Falha ao atualizar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $lesson = $this->lesson->find($id);

      $lesson->delete();

      return redirect()->route('module.lessons',$request->get('module_id'));
    }
}
