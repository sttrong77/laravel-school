<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Sale;
use App\User;

class SchoolController extends Controller
{

    private $totalPage = 10;

    public function index(Course $course){

      $courses = $course->where('published',true)
            ->orderBy('id','DESC')
            ->paginate($this->totalPage);

      $categories = Category::pluck('name','id');

      $title = "LaraSchool - A sua plataforma EAD";

      return view('school.home.index',compact('courses','title','categories'));
    }

    public function search(Request $request, Course $course){
       $dataForm = $request->except(['_token']);
       $keySearch = $dataForm['key-search'];
       $title = "Alunos desta disciplina - Resultados para {$keySearch}";

       $courses =$course->where('published',true)
             ->where('name','LIKE',"%{$keySearch}%")
             ->where('category_id',$dataForm['category'])
             ->orderBy('id','DESC')
             ->paginate($this->totalPage);

      $categories = Category::pluck('name','id');

      return view('school.home.index',compact('courses','title','categories','dataForm'));
    }

    public function course(Course $course, $url){
      $course = $course->where('url',$url)->with('user')->get()->first();



      $title = "Curso {$course->name} - LaraSchool";

      $modules = $course->modules()->with('lessons')->get();//uma consulta que traga os módulos do do curso e as lessons do module

      return view('school.site.course',compact('course','title','modules'));
    }

    public function lesson($url){

      // $lesson = Lesson::where('url',$url)->get()->first();

      $lesson = Lesson::join('modules','modules.id','=','lessons.module_id')
                ->join('courses','courses.id','=','modules.course_id')
                ->join('users','users.id','=','courses.user_id')
                ->where('lessons.url',$url)
                ->select('lessons.name',
                         'lessons.url',
                         'lessons.description',
                         'lessons.video',
                         'lessons.free as lesson_free',
                         'courses.name as course',
                         'courses.url as course_url',
                         'courses.free as course_free',
                         'modules.name as modulo',
                         'modules.id as modulo_id',
                         'users.name as user_name',
                         'users.bibliography as user_description',
                         'users.image as user_image'
                )
                ->get()->first();

      $title = "Aula {$lesson->name} - LaraSchool";

      return view('school.site.lesson',compact('lesson','title','user'));

    }

    public function myCourses(Sale $sale){
      $sales = $sale->myCourses($this->totalPage);

      $title = "Meus cursos - LaraSchool";

      return view('school.site.my-courses',compact('sales','title'));
    }

    public function user(User $user, $url){
      $user = $user->with('courses')->where('url',$url)->get()->first();

      $courses = $user->courses;

      $title = "Perfil Usuário {$user->name} - LaraSchool";

      return view('school.site.user-profile',compact('user','title','courses'));
    }

    public function success(){
      $title ='Parabéns, pedido realizado com sucesso!';
      return view('school.site.success',compact('title'));
    }

}
