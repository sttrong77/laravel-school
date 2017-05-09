<div class="form-group">
  {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nome:']) !!}
</div>

<div class="form-group">
  {!! Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'Url Curso:']) !!}
</div>

<div class="form-group">
  {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Descrição:']) !!}
</div>

<div class="form-group">
  {!! Form::file('image', ['class'=>'form-control', 'id'=>'file-input']) !!}
</div>

<div class="form-group">
  {!! Form::text('code', null, ['class'=>'form-control', 'placeholder'=>'Código Hotmart:']) !!}
</div>

<div class="form-group">
  {!! Form::time('total_hours', null, ['class'=>'form-control', 'placeholder'=>'Total de Horas:']) !!}
</div>

<div class="form-group">
  Publicar?
  {!! Form::checkbox('published',true) !!}
</div>

<div class="form-group">
  Gratuito?
  {!! Form::checkbox('free') !!}
</div>

<div class="form-group">
  {!! Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Valor total:']) !!}
</div>

<div class="form-group">
  {!! Form::text('price_plots', null, ['class'=>'form-control', 'placeholder'=>'Valor parcela:']) !!}
</div>

<div class="form-group">
  {!! Form::text('total_plots', null, ['class'=>'form-control', 'placeholder'=>'Total de parcelas:']) !!}
</div>

<div class="form-group">
  {!! Form::text('link_buy', null, ['class'=>'form-control', 'placeholder'=>'Link do Curso:']) !!}
</div>

<div class="form-group">
  <input type="submit" value="Enviar" class="btn btn-form">
</div>
