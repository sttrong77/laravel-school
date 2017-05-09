@extends('school.templates.template')

@section('content')
<div class="details-course">

<div class="container">
  <div class="col-md-7">
    <h1 class="title-course-detail">{{$course->name}}</h1>
    <h2 class="description-course">{{$course->description}}</h2>

    <p class="info"><strong>Categoria:</strong> {{$course->category_id}}</p>
    <p class="info"><strong>Total de Alunos:</strong>...</p>
    <p class="info"><strong>Professor:</strong>{{$course->user_id}}</p>
    <p class="info"><strong>Gratuito:</strong>
      @if($course->free) SIM @else NAO @endif
    </p>

    <p class="info"><strong>Total de Horas:</strong> {{$course->total_hours}}</p>
    <p class="info"><strong>Tempo de Acesso:</strong> Vitalício</p>
    <p class="info"><strong>Preço:</strong>{{$course->price}} </p>
    <p class="info"><strong>Parcelas:</strong> {{$course->total_plots}}</p>
    <p class="info"><strong>Preço Parcelas:</strong> {{$course->price_plots}}</p>

  </div>

  <div class="col-md-5 text-center">
    @if($course->image != null)
      <img src="{{url("uploads/courses/$course->image")}}" alt="{{$course->name}}">
    @else
      <img src="{{url('assets/imgs/courses/no-image.png')}}" alt="{{$course->name}}">
    @endif

    <a href="{{url($course->link_buy)}}" class="btn-buy">Comprar Agora!</a>
  </div>
</div>

</div>

<div class="details-course-itens">
<div class="container">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    @forelse($modules as $key => $module)
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
            Módulo {{$key +1}} - {{$module->name}}
          </a>
        </h4>
      </div>
      <div id="collapse-{{$key}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">

        @forelse($module->lessons as $key => $lesson)
          <a href="{{route('lesson',$lesson->url)}}" class="lesson">
            <i class="fa fa-video-camera" aria-hidden="true"></i>
              Aula {{$key+1}} - {{$lesson->name}}
            @if($lesson->free)
              <span class="badge badge-free">Free</span>
            @endif
           </a>
          @empty
            <p>Nenhuma aula cadastrada nesse módulo</p>
        @endforelse

        </div>
      </div>
    </div>
    @empty
      <div><p>Não existem módulos a serem exibidos!!</p></div>
    @endforelse

  </div>

</div>
</div><!--Details Curso Ementa-->
@endsection
