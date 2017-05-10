@extends('school.templates.template')

@section('content')
<section class="sales">
<div class="container">

  <h1 class="title">Minhas Vendas:</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Transação</th>
        <th>Aluno</th>
        <th>Curso</th>
        <th>Data</th>
      </tr>
    </thead>

    <tbody>
      @forelse($sales as $sale)
      <tr>
        <td>{{$sale->transaction}}</td>
        <td><a href="">{{$sale->user_name}}</a></td>
        <td><a href="">{{$sale->course_name}}</a></td>
        <td>{{$sale->date}}</td>
      </tr>
      @empty
        <p>Nenhuma venda realizada.</p>
      @endforelse
    </tbody>
  </table>

</div>
</section>
@endsection
