
<div class="form-group">
    {!! Form::label('name', 'Nombre de la galería') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-outline-secondary">Cancelar</a>
</div>
