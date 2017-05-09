<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  protected $fillable = ['module_id','name','url','description','free','video'];
}
