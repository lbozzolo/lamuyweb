@extends('layouts.app')

@section('css')
    <style type="text/css">
        body .popover{display:none !important; }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="card" id="form-fields">
                <div class="card-body">

                    <h1>{!! ucfirst($modelSpanishPlural) !!} /<span class="text-warning">crear</span></h1>

                    {!! Form::open(['route' => [$modelPlural.'.store'], 'method' => 'post']) !!}


                    @include($modelPlural.'.fields')


                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>


@endsection

@section('js')

    <script src="{{ asset('croppie/croppie.js') }}"></script>
    <script src="{{ asset('exif-js/exif.js') }}"></script>
    <script src="{{ asset('js/croppie-file-servicio.js') }}"></script>
    <script>

        $('#selectize').selectize({
            maxItems: 20
        });

        $('.summernote').summernote({
            height: 300,
        });

    </script>

@endsection