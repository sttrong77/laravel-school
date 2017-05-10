<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

  public $timestamps = false;

  public function myCourses($totalPage){
    return $this->join('courses','courses.id','=','sales.course_id')
         ->select('sales.id', 'courses.name', 'courses.image', 'courses.url', 'courses.description')
         ->where('sales.user_id', auth()->user()->id)
         ->paginate($totalPage);
  }

  public function mySales(){
    return $this->join('courses','courses.id','=','sales.course_id')
         ->join('users','users.id','=','sales.user_id')
         ->select('courses.name as course_name',
                  'courses.image',
                  'courses.url',
                  'courses.description',
                  'sales.transaction',
                  'sales.date',
                  'users.name as user_name',
                  'users.bibliography as user_description',
                  'users.image as user_image'
          )
         ->where('courses.user_id', auth()->user()->id)
         ->get();
  }

  public function myStudents(){
    return $this->mySales();
  }
}
