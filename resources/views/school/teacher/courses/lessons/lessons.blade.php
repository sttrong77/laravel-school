@extends('school.templates.template')

@section('content')

<div class="container">

  <h1 class="title">Aulas do Módulo: {{$module->name}}</h1>

  <a href="{{route('aulas.create')}}" class="btn btn-create">
    <span class="glyphicon glyphicon-plus"></span>
    Cadastrar
  </a>

  <table class="table table-striped">
    <tr>
      <th>Nome</th>
      <th>Url</th>
      <th>Descrição</th>
      <th>Free</th>
      <th width="100px">Ação</th>
    </tr>
    @foreach($lessons as $lesson)
    <tr>
      <td>{{$lesson->name}}</td>
      <td>{{$lesson->url}}</td>
      <td>{{$lesson->description}}</td>
      <td>{{$lesson->free}}</td>
      <td>
        <a href="{{route('aulas.edit',$lesson->id)}}" class="edit">
          <span class="glyphicon glyphicon-edit"></span>
        </a>
      
      </td>
    </tr>


    @endforeach()
  </table>

  <div class="pag">
    {!! $lessons->links() !!}
  </div>


</div>
  @endsection
