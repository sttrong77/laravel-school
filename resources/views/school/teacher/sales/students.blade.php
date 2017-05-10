@extends('school.templates.template')

@section('content')
<section class="container">
<h1 class="title">Meus Alunos:</h1>


<div class="students text-center">
  @forelse($students as $student)
  <article class="col-md-2 col-sm-4 col-xm-6 student">
    <a href="?pg=student-detail">
      @if($student->user_name != '')
        <img src="{{url('uploads/users/'.$student->user_name)}}" alt="$student->user_name" class="student-img img-circle">
      @else
        <img src="{{url('assets/imgs/profile.png')}}" alt="$student->user_name" class="student-img img-circle">
      @endif
      <h2>{{$student->user_name}}</h2>
    </a>
  </article>
  @empty
    <p>Nenhum aluno.</p>
  @endforelse
</div>
</section>
@endsection
