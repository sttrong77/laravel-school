@extends('school.templates.template')

@section('content')
  <section class="pg-form text-center">

  {!! Form::open(['route'=>['course.destroy',$course->id], 'class'=>'form form-school','method'=>'DELETE']) !!}
    {!! Form::submit('Deletar curso?', ['class'=>'btn btn-danger']) !!}
  {!! Form::close() !!}
  <h1 class="title">Editar CURSO {{$course->name}}</h1>

  @if(session('error'))
    <div class="alert alert-danger">
      {{session('error')}}
    </div>
  @endif

  @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
  @endif

  {!! Form::model($course,['route'=>['update.course', $course->id],'class'=>'form form-school', 'files'=>true,'method'=>'PUT']) !!}

    @include('school.teacher._form')

  {{ Form::close() }}

  </section>

@endsection
