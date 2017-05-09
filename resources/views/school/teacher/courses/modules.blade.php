@extends('school.templates.template')

@section('content')

<div class="container">

    <ol class="breadcrumb bread">
        <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
        <li class="active">Módulos</li>
    </ol>

    <h1 class="title">Módulos do Curso: {{$course->name}}</h1>

    @if( session('success') )
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <a href="{{route('modulos.create')}}" class="btn btn-create">
        <span class="glyphicon glyphicon-plus"></span>
        Cadastrar
    </a>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th width="100px">Ação</th>
        </tr>

        @foreach($modules as $module)
        <tr>
            <td>{{$module->name}}</td>
            <td>{{$module->description}}</td>
            <td>
                <a href="{{route('modulos.edit', $module->id)}}" class="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{route('module.lessons', $module->id)}}" class="edit">
                    <span class="glyphicon glyphicon-facetime-video"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pag">
        {!! $modules->links() !!}
    </div>

</div>

@endsection
