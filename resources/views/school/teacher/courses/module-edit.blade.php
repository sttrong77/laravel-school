@extends('school.templates.template')

@section('content')

<section class="pg-form text-center">
    <ol class="breadcrumb bread">
        <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
        <li><a href="{{route('course.modules', $module->course_id)}}">{{$module->name}}</a></li>
        <li class="active">Editar Módulo</li>
    </ol>

    <h1 class="title">Editar Módulo: {{$module->name}}</h1>

    @if( session('error') )
    <div class="alert alert-warning">
        {{session('error')}}
    </div>
    @endif

    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif


    {!! Form::model($module, ['route' => ['modulos.update', $module->id], 'class' => 'form form-school', 'method' => 'PUT']) !!}

    @include('school.teacher.courses._form  ')

    {{Form::close()}}

    {!! Form::open(['route' => ['modulos.destroy', $module->id], 'class' => 'form form-school', 'method' => 'DELETE']) !!}
        {!! Form::hidden('course_id', $module->course_id) !!}
        {!! Form::submit('Deletar?', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

</section>

@endsection
