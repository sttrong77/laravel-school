<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  protected $fillable = ['name','description','course_id'];

  public function lessons(){
    return $this->hasMany(Lesson::class);
  }
}
