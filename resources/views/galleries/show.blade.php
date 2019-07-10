@extends('layouts.app')

@section('css')

    <style type="text/css">

        .container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
        }
        .video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .modal-dialog{
            position: relative;
            display: table; /* This is important */
            overflow-y: auto;
            overflow-x: auto;
            width: auto;
            min-width: 300px;
            max-width: 100%;
        }

    </style>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>
                        {!! ucfirst($modelSpanishPlural) !!} /
                        <span class="text-warning"> {!! $item->name !!}</span>
                    </h2>

                    <div>
                        @if($item->active)
                            <label class="badge badge-success">{!! ($gender == 'M')? 'activo' : 'activa' !!}</label>
                        @else
                            <label class="badge badge-danger">{!! ($gender == 'M')? 'inactivo' : 'inactiva' !!}</label>
                        @endif
                        <small class="mr-2" style="padding: 5px">creada el {!! $item->fecha_creado !!}</small>
                    </div>

                    <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-outline-secondary">Volver</a>

                    @if($item->active)
                        <a href="{!! route($modelPlural.'.active', $item->id) !!}" class="btn btn-outline-danger">Desctivar</a>
                    @else
                        <a href="{!! route($modelPlural.'.active', $item->id) !!}" class="btn btn-outline-success">Activar</a>
                    @endif


                    <span title="Vaciar galería" data-toggle="modal" data-target="#emptyGallery" class="btn btn-danger"><i class="mdi mdi-delete-circle"></i> Vaciar esta galería</span>

                    <!-- Modal -->
                    <div class="modal fade" id="emptyGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Vaciar {!! ucfirst($modelSpanish) !!}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Desea vaciar esta {!! $modelSpanish !!}?</p>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::open(['route' => [$modelPlural.'.empty', $item->id], 'method' => 'delete']) !!}

                                    <button title="Eliminar" type="submit" class="btn btn-sm btn-danger">Vaciar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 grid-margin stretch-card">

            <div class="card card-body">
                <form method="post" action="{{ route('images.subir.multiple') }}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    {!! Form::hidden('class', 'Gallery') !!}
                    {!! Form::hidden('item_id', $item->id) !!}
                    <div class="input-group control-group increment" >
                        <input type="file" name="filename[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i class="mdi mdi-plus-circle"></i>agregar</button>
                        </div>
                    </div>
                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger remove-input" type="button"><i class="mdi mdi-minus"></i> suprimir</button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-top:10px">Subir</button>

                </form>
            </div>

        </div>
        <div class="col-lg-7 grid-margin ">

            @include('galleries.images')

        </div>
    </div>


@endsection

@section('js')

    <script src="{{ asset('croppie/croppie.js') }}"></script>
    <script src="{{ asset('exif-js/exif.js') }}"></script>
    <script src="{{ asset('js/croppie-file-servicio.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".remove-input",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>

@endsection
