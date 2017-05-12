<html>
  <body>
    <p>Olá, {{$user->name}}!</p>
    <p>Parabéns pela sua compra.</p>
    <p>Seu pedido para o curso foi realizado com sucesso.</p>
    <p>Logar:{{url('login')}}</p>
    <p>Usuário: {{$user->email}}</p>
    <p>Senha: {{$password}}</p>
    <p><a href="{{route('course',$course->url)}}">Clique aqui para ter acesso ao curso.</a></p>
    <p><p>
    <p>Att. <br>Equipe Devcon!</p>
  </body>
</html>
