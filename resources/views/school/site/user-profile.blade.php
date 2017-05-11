@extends('school.templates.template')

@section('content')
<div class="details-course">

<div class="container">
  <div class="col-md-7">
    <h1 class="title-course-detail">{{$user->name}}</h1>
    <h2 class="description-course">{{$user->bibliography}}</h2>
  </div>

  <div class="col-md-5 text-center">
    @if($user->image != '')
      <img src="{{url('uploads/users/'.$user->image)}}" alt="$user->image" class="img-student-detail img-circle">
    @else
      <img src="{{url('assets/imgs/profile.png')}}" alt="$user->image" class="img-student-detail img-circle">
    @endif
  </div>
</div>

</div>
<div class="details-course-itens">
	<div class="container">

    @foreach($courses as $course)
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
    @endforeach

	</div>
</div><!--Details Curso Ementa-->
@endsection
