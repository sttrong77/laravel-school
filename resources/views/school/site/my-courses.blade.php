@extends('school.templates.template')

@section('content')
<div class="container">

<h1 class="title">Minhas Compras:</h1>


<div class="courses">
  @forelse($sales as $course)
  <article class="col-md-3 col-sm-6 col-xm-12">
    <div class="course">
      @if($course->image != null)
        <img src="{{url("uploads/courses/$course->image")}}" alt="{{$course->name}}">
      @else
        <img src="{{url('assets/imgs/courses/no-image.png')}}" alt="{{$course->name}}">
      @endif

      <h2 class="title-course">{{$course->name}}</h2>

      <a href="{{route('course',$course->url)}}" class="btn-view">Saiba Mais</a>
    </div>
  </article>
  @empty
    <p>Nenhuma Compra! :/</p>
  @endforelse
</div><!--Courses-->

  <div class="pag">
    @if(isset($dataForm))
      {!! $courses->links() !!}
    @endif
  </div><!--Pagination-->
</div>

@endsection
