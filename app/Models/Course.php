<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function users(){
    return $this->belongsToMany(User::class,'sales','course_id','user_id')
                ->where('sales.status','approved');//model;tabela;campos de relacionamento
  }

  public function newCourse($dataForm){
    $dataForm['published'] = isset($dataForm['published']);
    $dataForm['free']      = isset($dataForm['free']);

    if($request->hasFile('image')){
      $image = $request->file('image');
      $nameImage = $dataForm['url'].'.'.$image->getClientOriginalExtension();

      $dataForm['image'] = $nameImage;

      $upload = $image->storeAs('courses', $nameImage );

      if(!$upload)
        return redirect()->back()->with('error','Falha no upload da imagem');
    }

    $dataForm['user_id'] = auth()->user()->id;

    return $this->course->create($dataForm);
  }

  public function search($keySearch){
    return $this->where('user_id', auth()->user()->id)
            ->where('name','LIKE',"%{$keySearch}%")
            ->orWhere('description','LIKE',"%{$keySearch}%")
            ->paginate($this->totalPage);
  }

  public function updateCourse($dataForm){
    $dataForm['published'] = isset($dataForm['published']);
    $dataForm['free']      = isset($dataForm['free']);

    if($request->hasFile('image')){
      $image = $request->file('image');

      if($course->image == null)
        $nameImage = $course->image;
      else
        $nameImage = $dataForm['url'].'.'.$image->getClientOriginalExtension();

        $dataForm['image'] = $nameImage;

      $upload = $image->storeAs('courses',  $nameImage );

      if(!$upload)
        return redirect()->back()->with('error','Falha no upload da imagem');
    }

    $dataForm['user_id'] = auth()->user()->id;

    return $course->update($dataForm);
  }

}
