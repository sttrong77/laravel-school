<div class="form-group">
  <label>Curso:</label>
    {!! Form::select('course_id',$courses, null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
  {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nome:']) !!}
</div>

<div class="form-group">
  {!! Form::textarea('description',null,['class'=>'form-control', 'placeholder'=>'Descricao:']) !!}
</div>

<div class="form-group">
  {!! Form::submit('Enviar',['class'=>'btn btn-form']) !!}
</div>
