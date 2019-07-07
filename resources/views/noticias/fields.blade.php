<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('highlight', 'Destacada:') !!}
    {!! Form::text('highlight', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('copete', 'Copete:') !!}
    {!! Form::text('copete', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('body', 'Texto:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control summernote', 'style' => 'height: 300px!important']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-default">Cancelar</a>
</div>
