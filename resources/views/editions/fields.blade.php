<div class="form-group col-lg-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-1">
    {!! Form::label('number', 'Número:') !!}
    {!! Form::number('number', null, ['class' => 'form-control', 'min' => 1, 'max' => 500]) !!}
</div>

<div class="form-group col-lg-1">
    {!! Form::label('date', 'Fecha:') !!}
    {!! Form::text('date', (isset($item) && $item->date)? $item->date : $current_date, ['class' => 'form-control datepicker', 'autocomplete' => 'off', 'style' => 'padding: 9px']) !!}
</div>

<div class="form-group col-lg-4">
    {!! Form::label('active', 'Estado:') !!}
    {!! Form::select('active', ['0' => 'Inactiva', '1' => 'Activa'], (isset($item))? $item->active : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('url_pdf', 'PDF de la revista') !!}
    {!! Form::file('url_pdf', ['class' => 'form-control', 'id' => 'pdf-file']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('url_cover', 'Imagen de portada') !!}
    {!! Form::file('url_cover', ['class' => 'form-control', 'id' => 'cover-file']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-lg-12">
    {!! Form::label('body', 'Descripción:') !!}
    <div>
        {!! Form::textarea('description', (isset($item)? $item->description : null), ['class' => 'form-control', 'rows' => '10']) !!}
    </div>
</div>

{{--EN CASO DE QUE EL MODELO TUVIERA CATEGORIAS--}}

{{--<div class="form-group col-lg-9">--}}
    {{--{!! Form::label('categories', 'Categorías') !!}--}}
    {{--@if(isset($noticia))--}}
    {{--<select name="categories[]" class="select2 form-control" placeholder="" multiple style="width: 100%">--}}
        {{--@foreach ($categories as $key => $value)--}}
            {{--<option value="{{ $key }}" @if ($noticia->categories->contains($key)) selected @endif>--}}
                {{--{{ $value }}--}}
            {{--</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
    {{--@else--}}
        {{--{!! Form::select('categories[]', $categories, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}--}}
    {{--@endif--}}
{{--</div>--}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-default">Cancelar</a>
</div>
