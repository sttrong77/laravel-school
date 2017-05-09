<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = [
    'category_id',
    'user_id',
    'name',
    'url',
    'description',
    'image',
    'code',
    'total_hours',
    'published',
    'free',
    'price',
    'price_plots',
    'total_plots',
    'link_buy',

  ];

  public function  scopeUserByAuth($query){ //pega usuario logado
    return $query->where('user_id',auth()->user()->id);
  }

  public function modules(){
    return $this->hasMany(Module::class);
  }
}
