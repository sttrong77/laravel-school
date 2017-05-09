@extends('school.templates.template')

@section('content')
  <section class="pg-form text-center">

  <a href="{{URL::previous()}}">Back << </a>

  <h1 class="title">Gestão Aula: {{$lesson->name or 'Novo'}}</h1>

  @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
  @endif

  @if(isset($lesson))
    {!! Form::model($lesson,['route'=>['aulas.update', $lesson->id],'class'=>'form form-school', 'method' => 'PUT']) !!}
  @else
    {!! Form::open(['route'=>'aulas.store','class'=>'form form-school']) !!}
  @endif

    <div class="form-group">
        <label>Módulos</label>
      {!! Form::select('module_id',$modules, null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Nome:']) !!}
    </div>

    <div class="form-group">
      {!! Form::text('url',null, ['class'=>'form-control','placeholder'=>'Url:']) !!}
    </div>

    <div class="form-group">
      {!! Form::text('video',null, ['class'=>'form-control','placeholder'=>'Vídeo:']) !!}
    </div>

    <div class="form-group">
        <label>Free?</label>
      {!! Form::checkbox('free','1') !!}
    </div>

    <div class="form-group">
      {!! Form::textarea('description',null, ['class'=>'form-control','placeholder'=>'Descrição:']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Enviar', ['class'=>'btn-form']) !!}
    </div>

  {!! Form::close() !!}

    @if(isset($lesson))
      {!! Form::open(['route'=>['aulas.destroy',$lesson->id],'method'=>'DELETE','class'=>'form']) !!}
        {!! Form::hidden('module_id',$lesson->module_id) !!}
        {!! Form::submit('Deletar?', ['class'=>'btn btn-danger']) !!}
      {!! Form::close() !!}
    @endif

  </section>

@endsection
