<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('epigrafe', 'Epígrafe:') !!}
    {!! Form::text('epigrafe', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('bajada', 'Bajada:') !!}
    {!! Form::text('bajada', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('body', 'Cuerpo:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control summernote', 'style' => 'height: 300px!important']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('categories[]', 'Categorías') !!}
    <div>
        {!! Form::select('categories[]', $categories, null, ['multiple', 'class' => 'form-control', 'id' => 'selectize']) !!}
    </div>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3" style="padding-top: 27px">
    {!! Form::checkbox('highlight') !!}
    <label style="padding-top: 7px" for="hightlight">Destacar esta noticia</label>
</div>

{!! Form::hidden('user_id', (isset($item))? $item->user_id : Auth::user()->id) !!}

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-default">Cancelar</a>
</div>
