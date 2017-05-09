@extends('school.templates.template')

@section('content')
<section class="pg-form text-center">
  <h1 class="title">Meu Perfil</h1>

  <form class="form-horizontal" role="form" method="POST" action="{{ url('profile-update') }}" enctype="multipart/form-data">
    {{Form::model(auth()->user(),['route'=>'profile.update','class'=>'form-horizontal', 'files'=>true])}}
    @include('school.user._form')

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-form">
                Atualizar Perfil
            </button>
        </div>
    </div>

      {{Form::close()}}
  </form>
</section>
@endsection
