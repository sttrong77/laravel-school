@extends('school.templates.template')

@section('content')

<section class="pg-form text-center">
    <ol class="breadcrumb bread">
        <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
        <li><a href="{{URL::previous()}}">Módulos</a></li>
        <li class="active">Novo Módulo</li>
    </ol>

    <h1 class="title">Cadastrar Novo Módulo</h1>

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

    {!! Form::open(['route' => 'modulos.store', 'class' => 'form form-school']) !!}

    @include('school.teacher.courses._form')

    {{Form::close()}}

</section>

@endsection
