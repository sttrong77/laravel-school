@extends('school.templates.template')

@section('content')
<section class="pg-form text-center">
  <h1 class="title">Cadastrar-se</h1>

  <form class="form-horizontal" role="form" method="POST" action="{{ url('new-user') }} enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


          <div class="col-md-12">
              <input id="name" placeholder="Digite seu nome" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

          <div class="col-md-12">
              <input id="email" type="email" placeholder="Digite seu email" class="form-control" name="email" value="{{ old('email') }}" required>

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

      <div class="form-group">

          <div class="col-md-12">
              <input id="password-confirm" placeholder="Confirme sua senha" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>

      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <div class="col-md-12">
                <input id="image" type="file" class="form-control" name="name">

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
        <div class="col-md-12">
                <input id="token" placeholder="Digite seu token" type="text" class="form-control" name="token" value="{{ old('token') }}" required autofocus>

                @if ($errors->has('token'))
                    <span class="help-block">
                        <strong>{{ $errors->first('token') }}</strong>
                    </span>
                @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('bibliography') ? ' has-error' : '' }}">
        <div class="col-md-12">
                <textarea name="bibliography" placeholder="Digite sua bibliografia" class="form-control">{{old('bibliography')}}</textarea>
                @if ($errors->has('bibliography'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bibliography') }}</strong>
                    </span>
                @endif
          </div>
      </div>


      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-form">
                  Cadastrar
              </button>
              <a class="btn btn-link" href="{{ url('login') }}">
                  Entrar
              </a>
          </div>
      </div>
  </form>
</section>
@endsection
