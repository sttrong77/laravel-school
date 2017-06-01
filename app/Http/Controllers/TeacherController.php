<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Sale;
use App\Http\Requests\CourseRequest;
use Gate;

class TeacherController extends Controller
{

  private $course;
  private $totalPage = 8;

  public function __construct(Course $course){
    $this->course = $course;
  }

  public function createCurso(Category $category){
    $categories = $category::pluck('name', 'id');
    $title = 'Cadastrar Novo Curso';
    return view('school.teacher.store-course', compact('categories','title'));

  }

  public function storeCurso(CourseRequest $request){
    $dataForm = $request->all();

    $insert = $this->course->newCourse($dataForm);

    if($insert)
      return redirect()->route('teacher.courses')->with('success','Novo curso cadastrado com sucesso');
    else {
      return redirect()->back()->with(['errors'=>'Falha ao cadastrar curso']);
    }
  }

  public function courses(){
    $title = 'Instrutor: Meus cursos';
    $courses = $this->course->userByAuth()->paginate($this->totalPage);//pega cursos do professor logado

    return view('school.teacher.courses',compact('courses','title'));
  }

  public function coursesSearch(Request $request){
    $dataForm = $request->except(['_token']);
    $keySearch = $dataForm['key-search'];
    $title = "Instrutor: Meus cursos - Resultados para {$keySearch}";

    $courses = $this->course->search($keySearch);

    return view('school.teacher.courses',compact('courses','title', 'dataForm'));
  }

  public function editCourse(Category $category, $id){
    $course = $this->course->find($id);

    if(Gate::denies('owner-course', $course))
      return redirect()->back();

    $title = "Editando Curso {$course->name}";

    $categories = $category::pluck('name', 'id');
    return view('school.teacher.edit-course', compact('categories','title', 'course'));


  }

  public function updateCourse(CourseRequest $request, $id){

    $course = $this->course->find($id);

    $this->authorize('owner-course',$course);

    $dataForm = $request->all();

    $update = $course->updateCourse($dataForm);

    if($update)
      return redirect()->route('teacher.courses')->with('success','Curso atualizado com sucesso');
    else {
      return redirect()->back()->with('error','Falha ao atualizar curso');
    }
  }

  public function destroyCourse($idCourse){
    $course = $this->course->find($idCourse);

    $this->authorize('owner-course',$course);

    $modules = $course->modules()->count(); //qtd de modulos

    if($modules == 0 ){//se o curso tiver modulos
      $course->delete();
      return redirect()->route('teacher.courses')->with('success','Curso deletado com sucesso');
    }
      return redirect()->back()->with('error','Delete os módulos deste curso primeiramente');
  }

  public function mySales(Sale $sale){
    $sales = $sale->mySales();

    $title = "Minhas Vendas - LaraSchool";

    return view('school.teacher.sales.sales',compact('sales','title'));
  }

  public function myStudents(Sale $sale){
    $students = $sale->myStudents();

    $title = "Meus Alunos - LaraSchool";

    return view('school.teacher.sales.students',compact('students','title'));
  }
}
