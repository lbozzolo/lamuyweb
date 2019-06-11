@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">

            <h1>
                {!! ucfirst($modelSpanishPlural) !!}
                <a class="btn btn-primary btn-sm" href="{!! route($modelPlural.'.create') !!}">Agregar</a>
            </h1>

        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            @if($items->count())

                <div>
                    <span title="Tabla"><i class="mdi mdi-table text-muted"></i> </span>
                    <span title="Lista"><a href="{!! route('editions.index') !!}"><i class="mdi mdi-view-list"></i></a></span>
                </div>

                <div class="table-responsive" style="margin-top: 20px">
                @include($modelPlural.'.table')
                </div>
            @else
                <span class="text-muted">{!! $noResultsMessage !!}</span>
            @endif
        </div>
    </div>

@endsection
