@extends('school.templates.template')

@section('content')
<section class="pg-form text-center">
  <h1 class="title">Entrar</h1>
  <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

          <div class="col-md-12">
              <input id="email" type="email" class="form-control" placeholder="Digite seu email" name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

          <div class="col-md-12">
              <input id="password" placeholder="Digite seu usuário" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="btn btn-form">
                  Entrar
              </button>
              <a class="btn btn-link" href="{{ url('cadastrar') }}">
                Cadastrar
              </a>
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  Esqueceu senha?
              </a>
          </div>
      </div>
  </form>
</section>
@endsection
