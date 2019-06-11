

@if($item->url_cover)
    <div class="col-lg-4 text-right">
        <img src="{{ route('cover.ver', $item->url_cover) }}" class="img-responsive" style="width: 100%">
    </div>
@else
    <div class="col-lg-4" style="border: 1px solid lightgrey; padding: 20px 30px">
        <p class="lead text-default">No hay imagen <br>de portada cargada.</p>
    </div>
@endif


<div class="col-lg-8">

    <div class="row">
        <div class="form-group col-lg-12">
            {!! Form::label('title', 'Título:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-lg-3">
            {!! Form::label('number', 'Número:') !!}
            {!! Form::number('number', null, ['class' => 'form-control', 'min' => 1, 'max' => 500]) !!}
        </div>

        <div class="form-group col-lg-3">
            {!! Form::label('date', 'Fecha:') !!}
            {!! Form::text('date', (isset($item) && $item->date)? $item->date_formatted : null, ['class' => 'form-control datepicker', 'autocomplete' => 'off', 'style' => 'padding: 9px']) !!}
        </div>

        <div class="form-group col-lg-6">
            {!! Form::label('active', 'Estado:') !!}
            {!! Form::select('active', ['0' => 'Inactiva', '1' => 'Activa'], (isset($item))? $item->active : null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
    @if(isset($item) && $item->url_pdf)

        <ul class="col-lg-6">
            <li class="list-group-item">
                <span class="btn btn-danger btn-xs float-right" data-toggle="modal" data-target="#removePdf{!! $item->id !!}">eliminar</span>
                <span>PDF: </span>
                <a href="{!! route('pdf.ver', $item->url_pdf) !!}" target="_blank">
                    <span class="text-primary">
                    <i class="fa fa-file-pdf-o"></i> {!! $item->url_pdf !!}
                </span>
                </a>
            </li>
        </ul>

    @else
        <div class="form-group col-lg-6">
            {!! Form::label('url_pdf', 'PDF de la revista') !!}
            {!! Form::file('url_pdf', ['class' => 'form-control', 'id' => 'pdf-file']) !!}
        </div>
    @endif

    @if(isset($item) && $item->url_cover)

        <ul class="col-lg-6">
            <li class="list-group-item">
                <span class="btn btn-danger btn-xs float-right" data-toggle="modal" data-target="#removeCoverImage{!! $item->id !!}">eliminar</span>
                <span>Portada: </span>
                <span class="text-warning"><i class="fa fa-file-pdf-o"></i> {!! $item->url_cover !!}</span>
            </li>
        </ul>

    @else
        <div class="form-group col-lg-6">
            {!! Form::label('url_cover', 'Imagen de portada') !!}
            {!! Form::file('url_cover', ['class' => 'form-control', 'id' => 'cover-file']) !!}
        </div>
    @endif
    </div>

    <!-- Description Field -->
    <div class="form-group">
        {!! Form::label('body', 'Descripción:') !!}
        <div>
            {!! Form::textarea('description', (isset($item)? $item->description : null), ['class' => 'form-control', 'rows' => '10']) !!}
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12" style="margin-top: 30px">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-default">Cancelar</a>
    </div>

</div>





