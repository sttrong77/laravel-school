@extends('school.templates.template')

@section('content')
<section class="pg-form text-center">
  <h1 class="title">Resetar senha</h1>
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
      {{ csrf_field() }}

      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

          <div class="col-md-12">
              <input id="email" placeholder="Digite seu email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

          <div class="col-md-12">
              <input id="password" placeholder="Digite sua senha" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <div class="col-md-12">
              <input id="password-confirm" placeholder="Confirme sua senha" type="password" class="form-control" name="password_confirmation" required>

              @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-form">
                Alterar senha
              </button>
          </div>
      </div>
  </form>
</section>
@endsection
