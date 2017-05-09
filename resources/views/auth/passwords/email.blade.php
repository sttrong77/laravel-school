@extends('school.templates.template')

@section('content')
<section class="pg-form text-center">
  <h1 class="title">Resetar senha</h1>
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

          <div class="col-md-12">
              <input id="email" type="email" placeholder="Digite sua senha" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-form">
                  Enviar email para resetar senha
              </button>
          </div>
      </div>
  </form>
</section>
@endsection
