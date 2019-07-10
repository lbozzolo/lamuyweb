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

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center">
                                <a href="{!! route($modelPlural.'.show', $gallery->id) !!}" class="text-center">
                                    @if($gallery->mainImage())
                                        <div style="min-height: 200px; width: 100%; background-image: url('{!! asset('imagenes/'.$gallery->mainImage()->path) !!}'); background-size: cover; background-repeat: no-repeat"></div>
                                        {{--<div style="height: 150px; width: 200px; background-image: url('{!! asset('imagenes/'.$gallery->mainImage()->path) !!}'); background-size: cover; background-repeat: no-repeat"></div>--}}
                                        <p style="margin-top: 13px; @if($gallery->active) color: limegreen @endif">
                                            {!! $gallery->name !!} ({!! $gallery->fecha_creado !!})
                                        </p>
                                    @else
                                        <div style="border: 1px solid lightgrey; min-height: 200px; width: 100%; background-image: url('{!! asset('images/noimage.png') !!}'); background-size: cover; background-repeat: no-repeat"></div>

                                        {{--<img src="{!! asset('images/noimage.png') !!}" style="width: 100%; @if($gallery->active) border: 2px solid limegreen @else border: 1px solid lightgray @endif">--}}
                                        <p style="margin-top: 13px; @if($gallery->active) 'color: limegreen' @endif">
                                            {!! $gallery->name !!} ({!! $gallery->fecha_creado !!})
                                        </p>
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

        $(document).ready(function(){

            $('.img-responsive').each(function() {
                var maxWidth = 200; // Max width for the image
                var maxHeight = 150;    // Max height for the image
                var ratio = 0;  // Used for aspect ratio
                var width = $(this).width();    // Current image width
                var height = $(this).height();  // Current image height

                // Check if the current width is larger than the max
                if(width > maxWidth){
                    ratio = maxWidth / width;   // get ratio for scaling image
                    $(this).css("width", maxWidth); // Set new width
                    $(this).css("height", height * ratio);  // Scale height based on ratio
                    height = height * ratio;    // Reset height to match scaled image
                }

                var width = $(this).width();    // Current image width
                var height = $(this).height();  // Current image height

                // Check if current height is larger than max
                if(height > maxHeight){
                    ratio = maxHeight / height; // get ratio for scaling image
                    $(this).css("height", maxHeight);   // Set new height
                    $(this).css("width", width * ratio);    // Scale width based on ratio
                    width = width * ratio;    // Reset width to match scaled image
                }

            });

        });

    </script>

@endsection
