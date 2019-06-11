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
                <div class="table-responsive">
                    @include($modelPlural.'.table')
                </div>
            @else
                <span class="text-muted">{!! $noResultsMessage !!}</span>
            @endif

        </div>
    </div>

@endsection

