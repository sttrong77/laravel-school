@extends('school.templates.template')

@section('content')
<section class="container text-center">
	<div class="pg-form">
		<h1 class="title">Pedido Realizado com Sucesso!</h1>
		<p>O Hotmart está processando o seu pagamento, assim que estiver concluído iremos enviar um e-mail com as instruções para acessar o curso.</p>

		<img src="{{url('assets/imgs/success.png')}}" alt="Sucesso!">
	</div>

</section>
@endsection
