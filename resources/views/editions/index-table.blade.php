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

                <span style="float: right" title="Tabla"><i class="mdi mdi-table text-muted"></i> </span>
                <span style="float: right" title="Lista"><a href="{!! route('editions.index') !!}"><i class="mdi mdi-view-list"></i></a></span>
                <div class="table-responsive">
                @include($modelPlural.'.table')
                </div>
            @else
                <span class="text-muted">{!! $noResultsMessage !!}</span>
            @endif
        </div>
    </div>

@endsection
