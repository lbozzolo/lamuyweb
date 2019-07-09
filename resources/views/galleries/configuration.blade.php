@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>
                        {!! ucfirst($modelSpanishPlural) !!} / <span class="text-warning">configuración</span>
                        <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-outline-secondary">Cancelar</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    @include('galleries.partials.delete')

    @include('galleries.partials.change-names')


@endsection

@section('js')

    <script>

        $('#create-gallery-btn').click(function () {

            $('#create-gallery').show();

        });

    </script>

@endsection
