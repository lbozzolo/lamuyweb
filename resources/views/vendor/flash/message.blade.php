

{{-- Errores --}}
@if ($errors->count() > 0)

    <div class="alert alert-danger alert-dismissible">

        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-warning"></i>
        {{--Ha ocurrido un error:<br />--}}
        @if ($errors->count() > 1)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif

    </div>

@endif

{{-- Success --}}
@if (session()->has('ok') || isset($ok))

    <div class="alert alert-success alert-dismissible">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-check"></i>
        @if (session()->has('ok'))
            {!! session('ok') !!}
        @else
            {!! $ok !!}
        @endif
    </div>

@endif

{{-- Info --}}
@if (session()->has('info') || isset($info))

    <div class="alert alert-info alert-dismissible">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-exclamation-triangle"></i>
        @if (session()->has('info'))
            {!! session('info') !!}
        @else
            {!! $info !!}
        @endif
    </div>

@endif

{{-- Warning --}}
@if (session()->has('warning') || isset($warning))

    <div class="alert alert-warning alert-dismissible">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-exclamation-triangle"></i>
        @if (session()->has('warning'))
            {!! session('warning') !!}
        @else
            {!! $warning !!}
        @endif
    </div>

@endif