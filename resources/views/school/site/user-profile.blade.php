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

		<?php
			for($i = 0; $i < 6; $i++){
		?>
		<article class="col-md-3 col-sm-6 col-xm-12">
			<div class="course">
				<img src="imgs/courses/curso-laravel-acl-especializati.png" alt="Course">

				<h2 class="title-course">Curso de Vagrant <?=$i?></h2>

				<a href="?pg=curso" class="btn-view">Saiba Mais</a>
			</div>
		</article>

		<?php } ?>

	</div>
</div><!--Details Curso Ementa-->
@endsection
