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
                    <span title="Tabla"><a href="{!! route('editions.index.table') !!}"><i class="mdi mdi-table"></i> </a></span>
                    <span title="Lista"><i class="mdi mdi-view-list text-muted"></i></span>
                </div>

                <ul class="list-unstyled list-inline row">
                    @foreach($items as $item)



                            @if($item->url_cover && file_exists(public_path('covers/'.$item->url_cover)))
                            <li class="list-group-item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <a href="{!! route($modelPlural.'.show', $item->id) !!}" class="text-dark">
                                    <img src="{{ route('cover.ver', $item->url_cover) }}" class="img-responsive" style="width: 100%">

                                    <span class="badge badge-dark">Edición # {!! $item->number !!}</span>
                                    {{--<span>{!! $item->title !!}</span>--}}
                                </a>
                            </li>
                            @else
                            <li class="list-group-item col-lg-2 col-md-3 col-sm-4 col-xs-6" style="position: relative; border: 2px dotted lightgrey;">
                                <p class="text-center text-secondary">Sin imagen<br><i class="mdi mdi-close-outline mdi-36px"></i></p>
                                 <a href="{!! route($modelPlural.'.show', $item->id) !!}" class="text-dark" style="position: absolute; bottom: 0; margin-bottom: 12px">
                                    <span class="badge badge-dark">Edición # {!! $item->number !!}</span>
                                </a>
                            </li>
                            @endif

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
