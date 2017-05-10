@extends('school.templates.template')

@section('content')
<section class="container">

<div class="lesson-info">

  <div class="col-md-8">
      @if( auth()->check()  && ($lesson->lesson_free || $course->course_free))
    <div class="embed-responsive embed-responsive-16by9">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/founBXufLYg" frameborder="0" allowfullscreen></iframe>
    </div>

    <ol class="breadcrumb">
      <li><a href="{{route('course',$lesson->course_url)}}">{{$lesson->course}}</a></li>
      <li><a href="{{route('course',$lesson->course_url)}}">{{$lesson->modulo}}</a></li>
      <li class="active">{{$lesson->name}}</li>
    </ol>

    <h1 class="title-lesson">{{$lesson->name}}</h1>

    <div class="description-lesson">
      <p>{{$lesson->description}}</p>
    </div>

    @else
    <div class="img-lesson-block">
      <img src="{{url('assets/imgs/block.jpg')}}" alt="Lock" class="lesson-lock">

      @if( !auth()->check() )
        <a href={{url('login')}}>Faça Login Para Ter Acesso!</a>
      @else
        <a href={{route('course',$lesson->course_url)}}>Compre esse curso para ter acesso a aula</a>
      @endif
    </div>


    @endif
    <div class="share">
      <ul class="social-share">
        <li>
          <a href="javascript:void(0)" class="facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{Request::URL()}}', 'width=626,height=436'); return false;">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="twitter" onclick="window.open('http://twittter.com/share?url={{Request::URL()}}', 'width=626,height=436'); return false;">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="google-plus" onclick="window.open('https://plus.google.com/share?url={{Request::URL()}}', 'width=626,height=436'); return false;">
            <i class="fa fa-google-plus" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="linkedin" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{Request::URL()}}', 'width=626,height=436'); return false;">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
    </div><!--Share-->

    <section class="author">
      <div class="col-md-2 text-center">
        @if($lesson->user_image != '')
          <img src="{{url("uploads/users/$lesson->user_image")}}" alt="{{$lesson->name}}" class="img-circle">
        @else
          <img src="{{url('assets/imgs/profile.png')}}" alt="{{$course->name}}" class="img-circle">
        @endif
      </div>
      <div class="col-md-10">
        <h2>{{$lesson->user_name}}</h2>
        <p>{{$lesson->user_description}}</p>
      </div>
    </section><!--Author-->

    <div class="comment">
      <div id="disqus_thread"></div>
      <script>
          (function() {  // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');

              s.src = 'https://especializati-site.disqus.com/embed.js';

              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
          })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
    </div><!--Comment-->
  </div>
  <!--Lesson-->

  <!--sidebar-->
  <div class="col-md-4">
    <a href="" target="_blank">
      <img src="{{url('assets/imgs/banner-curso-laravel-webservices-api.jpg')}}" alt="Curso Laravel Web Services EspecializaTi">
    </a>
  </div>
  <!--end sidebar -->

</div><!--lesson-->

</section>
@endsection
