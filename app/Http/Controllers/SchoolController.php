<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class SchoolController extends Controller
{

    private $totalPage = 1;

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
}
