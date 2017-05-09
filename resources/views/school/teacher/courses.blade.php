@extends('school.templates.template')

@section('content')

<div class="container">

<div class="form-search">
    {!! Form::open(['route'=>'teacher.courses.search', 'class'=>'form form-inline']) !!}
      {!! Form::text('key-search', null, ['placeholder'=>'Digite um nome para pesquisar','class'=>'form-control']) !!}


    <input type="submit" value="Pesquisar" class="btn btn-search">

    {!! Form::close() !!}

    @if(isset($dataForm['key-search']))
      <p><b>Resultados para: </b>{{$dataForm['key-search']}}</p>
    @endif
</div>

@if(session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
@endif

<h1 class="title">{{$title or 'Instrutor: Meus Cursos'}}</h1>


  <div class="courses">

    @foreach($courses as $course)

    <article class="col-md-3 col-sm-6 col-xm-12">
      <div class="course">
        @if($course->image != null)
          <img src="{{url("uploads/courses/$course->image")}}" alt="{{$course->name}}">
        @else
          <img src="{{url('assets/imgs/courses/no-image.png')}}" alt="{{$course->name}}">
        @endif
        <h2 class="title-course">{{$course->name}}</h2>

        <a href="#" class="btn-view-teacher">
          <span class="glyphicon glyphicon-eye-open"></span>
        </a>
        <a href="{{route('teacher.course.edit',$course->id)}}" class="btn-view-edit">
          <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="{{route('course.modules', $course->id)}}" class="btn-module-teacher">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
      </div>
    </article>
    @endforeach
  </div><!--Courses-->

  <div class="pag">
    @if(isset($dataForm))
      {!! $courses->appends($dataForm)->links() !!}
    @else
        {!! $courses->links() !!}
    @endif
  </div><!--Pagination-->
</div>
  @endsection
