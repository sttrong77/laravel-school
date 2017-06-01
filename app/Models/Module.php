<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  protected $fillable = ['name','description','course_id'];

  public function lessons(){
    return $this->hasMany(Lesson::class);
  }

  public function course(){//recupera o curso do modulo
    return $this->belongsTo(Course::class);
  }

  public function modulesUser(){
    return $this->join('courses','courses.id','=','modules.course_id')
         ->where('courses.user_id',auth()->user()->id)
         ->pluck('modules.name','modules.id');
  }

}
