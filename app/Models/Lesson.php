<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Lesson extends Model
{
  protected $fillable = ['module_id','name','url','description','free','video'];

  public function user(){
    return $this->belongsTo(User::class);
  }

}
