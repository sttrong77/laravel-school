@extends('school.templates.template')

@section('content')
<section class="container">

<div class="lesson-info">

  <div class="col-md-8">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/founBXufLYg" frameborder="0" allowfullscreen></iframe>
    </div>

    <ol class="breadcrumb">
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">Módulo Básico</a></li>
      <li class="active">Título da Aula Vem Aqui</li>
    </ol>

    <h1 class="title-lesson">{{$lesson->name}}</h1>

    <div class="description-lesson">
      <p>{{$lesson->description}}</p>
    </div>

    <div class="share">
      <ul class="social-share">
        <li>
          <a href="" class="facebook">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="" class="twitter">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="" class="google-plus">
            <i class="fa fa-google-plus" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="" class="linkedin">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
        </li>
        <li>
          <a href="" class="youtube">
            <i class="fa fa-youtube" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
    </div><!--Share-->

    <section class="author">
      <div class="col-md-2 text-center">
        <img src="imgs/student.png" alt="Carlos Ferreira" class="img-circle">
      </div>
      <div class="col-md-10">
        <h2>{{$user->name}}</h2>
        <p>Descrição completa deste professor por vir vem aqui.</p>
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
