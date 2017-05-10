<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{{$title or 'LaraSchool'}}</title>

		<!--Fonts Google-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<!--Bootstrap-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!--Fonts-->
		<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

		<!--CSS Person-->
		<link rel="stylesheet" href="{{url('assets/css/style.css')}}">

		<!--CSS Reset-->
		<link rel="stylesheet" href="{{url('assets/css/reset.css')}}">

		<!--Favicon da Página-->
		<link rel="icon" type="image/png" href="{{url('assets/imgs/favicon.png')}}">
	</head>
	<body>
		<nav class="nav-header">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{route('home')}}">
		      	<img src="{{url('assets/imgs/logo-laraschool.png')}}" alt="LaraSchool" class="logo">
		      </a>
		    </div>


		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					@if(auth()->check())
		      <ul class="navbar-nav menu-itens">
		        <li><a href="{{route('sales')}}">Meus Cursos</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Instrutor <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
		            <li><a href="{{route('my.students')}}">Alunos</a></li>
		            <li><a href={{route('my.sales')}}>Vendas</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="{{route('create.course')}}">Cadastrar Curso</a></li>
		          </ul>
		        </li>
		      </ul>
					@endif

		      <ul class="navbar-nav navbar-right menu-profile">
						@if(auth()->check())
						<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								@if(auth()->user()->image != '')
									<img src="{{url('uploads/users/'.auth()->user()->image)}}" alt="Profile" class="img-profile">
								@else
									<img src="{{url('assets/imgs/profile.png')}}" alt="Profile" class="img-profile">
								@endif

		          <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="{{route('profile')}}">Meu Perfil</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="{{url('logout')}}">Sair</a></li>
		          </ul>
		        </li>
						@else
						<li>
							<a href="{{url('login')}}">Entrar</a>
						</li>
						@endif
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav><!--End Menu-->


		<section class="content">
			@yield('content')
		</section><!--Section Content-->


		<footer class="footer">
			<div class="container">
				<div class="col-md-6">
					<img src="{{url('assets/imgs/logo-laraschool-two.png')}}" alt="LaraSchool" class="logo-footer">
				</div>
				<div class="col-md-6 text-center">
					<ul class="social">
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
				</div>
			</div>
		</footer>
		<div class="copy text-center">
			<p>Todos os direitos reservados LaraSchool - <?=date('Y')?></p>
		</div>



		<!--JS-->

		<!--jQuery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!--Bootstrap-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
