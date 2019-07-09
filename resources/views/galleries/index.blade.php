@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>
                        {!! ucfirst($modelSpanishPlural) !!}
                        <span id="create-gallery-btn" class="btn btn-primary"><i class="mdi mdi-plus-circle"></i> Agregar</span>
                        <a href="{!! route($modelPlural.'.config') !!}" class="btn btn-outline-dark"><i class="mdi mdi-pencil-box"></i> Configuración</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="display: none" id="create-gallery">
        <div class="col-lg-12 grid-margin">

            <div class="card" id="form-fields">
                <div class="card-body">

                    {!! Form::open(['route' => [$modelPlural.'.store'], 'method' => 'post']) !!}


                    @include($modelPlural.'.fields')


                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        @forelse($galleries as $gallery)

                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <a href="{!! route($modelPlural.'.show', $gallery->id) !!}" class="text-center">
                                    @if($gallery->mainImageThumb())
                                        <img src="{{ route('imagenes.ver', $gallery->mainImageThumb()->path) }}" style="width: 100%; @if($gallery->active) border: 2px solid limegreen @endif">
                                        <p style="margin-top: 13px; @if($gallery->active) color: limegreen @endif">{!! $gallery->name !!}</p>
                                    @else
                                        <img src="{!! asset('images/noimage.png') !!}" style="width: 100%; @if($gallery->active) border: 2px solid limegreen @else border: 1px solid lightgray @endif">
                                        <p style="margin-top: 13px; @if($gallery->active) 'color: limegreen' @endif">{!! $gallery->name !!}</p>
                                    @endif
                                </a>
                            </div>

                        @empty

                            <div class="col-lg-12">
                                <p class="text-secondary">
                                    Todavía no hay ninguna galería creada
                                    <a href="{!! route($modelPlural.'.create') !!}">crear</a>
                                </p>
                            </div>

                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>

        $('#create-gallery-btn').click(function () {

            $('#create-gallery').show();

        });

    </script>

@endsection
