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

                <span style="float: right" title="Tabla"><a href="{!! route('editions.index.table') !!}"><i class="mdi mdi-table"></i> </a></span>
                <span style="float: right" title="Lista"><i class="mdi mdi-view-list text-muted"></i></span>
                <ul class="list-unstyled list-inline row">
                    @foreach($items as $item)
                        <li class="list-group-item col-lg-2">

                            @if($item->url_cover)
                                <a href="{!! route($modelPlural.'.show', $item->id) !!}" class="text-dark">
                                    <img src="{{ route('cover.ver', $item->url_cover) }}" class="img-responsive" style="width: 100%">
                                </a>
                            @else
                                <div style="border: 2px dotted lightgrey; height: 90%; padding: 20px 30px; margin-bottom: 10px">
                                    <p class="text-default">No hay imagen <br>de portada.</p>
                                </div>
                            @endif
                            <a href="{!! route($modelPlural.'.show', $item->id) !!}" class="text-dark">
                                <span class="badge badge-dark"># {!! $item->number !!}</span>
                                <span>{!! $item->title !!}</span>
                            </a>

                        </li>
                    @endforeach
                </ul>
                {{--<div class="table-responsive">--}}
                    {{--@include($modelPlural.'.table')--}}
                {{--</div>--}}
            @else
                <span class="text-muted">{!! $noResultsMessage !!}</span>
            @endif
        </div>
    </div>

@endsection
