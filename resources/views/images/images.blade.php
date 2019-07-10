
<div class="card" id="list-images">
    <div class="card-header">

        <span class="float-right">
            <span id="producto-id" data-producto-id="{!! route('subir.imagen', ['id' => $item->id, 'class' => ucfirst($model)]) !!}"></span>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="file" class="file-upload form-control" id="file-upload" name="img" accept="image/*">
        </span>
        <span class="float-right text-secondary" style="padding: 5px; font-size: 1.5em"><i class="mdi mdi-cloud-upload"></i></span>
        <h3>Imágenes</h3>

    </div>
    <div class="card-body" style="background-color: #f2f8f9">
        @forelse($item->imagesThumb as $image)

            <span style="display: inline-block">
            <a href="" data-toggle="modal" data-target="#modalVerImage{!! $image->id !!}">
                <img src="{{ route('imagenes.ver', $image->path) }}" alt="{!! $image->title !!}" class="img-responsive" style="{!! ($image->main == 0)? 'opacity: 0.5;' : '' !!} height: 80px">
            </a>
        </span>

        @empty

            <span class="text-muted"><i class="mdi mdi-vanish"></i> <small><em>No hay imágenes para mostrar.</em></small> </span>

        @endforelse
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div id="croppie-image" data-width="{!! $item->image_croppie_width !!}" data-height="{!! $item->image_croppie_height !!}" style="display: none">

            <div id="resizer" style="width: 100%"></div>

            <div class="lead text-center">
                <button class="btn btn-secondary rotate" data-deg="90"><i class="mdi mdi-rotate-left" style="font-size: 2em"></i></button>
                <button class="btn btn-primary" id="upload" >Aceptar</button>
                <a href="{{ route($modelPlural.'.edit', $item->id) }}" class="btn btn-light">Cancelar</a>
                <button class="btn btn-secondary rotate" data-deg="-90"><i class="mdi mdi-rotate-right" style="font-size: 2em"></i></button>
            </div>

        </div>

    </div>
</div>


@foreach($item->imagesBig as $image)

    <div class="modal fade" id="modalVerImage{!! $image->thumbnail_id !!}">

        <div class="modal-dialog">
            <div class="modal-content" style="min-height: 200px">
                <div class="modal-body">
                    <img src="{{ route('imagenes.ver', $image->path) }}" class="img-responsive" alt="{!! $image->title !!}" style="width: 100%; margin: 0px auto">
                </div>
                <div class="modal-footer">

                    @if($image->main == 0)
                        <a href="{{ route('images.main', ['id' => $item->id, 'class' => ucfirst($model), 'imagen' => $image->id]) }}" class="btn btn-outline-primary" title="Destacar imagen">
                            <i class="mdi mdi-star"></i> Destacar
                        </a>
                    @else
                        <button type="button" class="btn btn-outline-primary" disabled title="Destacar imagen">
                            <i class="mdi mdi-star-outline"></i> Destacar
                        </button>
                    @endif
                    <button class="btn btn-outline-danger" title="Eliminar foto" data-toggle="modal" data-target="#modalDeleteImage{!! $image->thumbnail_id !!}">
                        <i class="mdi mdi-delete"></i> Eliminar
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        <i class="mdi mdi-close"></i> Cancelar
                    </button>

                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="modalDeleteImage{!! $image->thumbnail_id !!}" style="margin-top: 5%">
            <div class="modal-dialog">
                <div class="modal-content col-lg-10 col-lg-offset-1 text-center" style="border: 1px solid #e65251; border-radius: 0px">

                    <div class="modal-body bg-danger text-white" style="margin-top: 20px">
                        <p class="text-red">¿Está seguro que desea eliminar la imagen?</p>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        {!! Form::open(['method' => 'DELETE', 'url' => route('images.destroy', $image->thumbnail_id)]) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endforeach


