@extends('web.layout')


@section('content')

    @include('web.partials.header')

    @if($slider)
        @include('web.partials.sliders')
    @endif

@endsection