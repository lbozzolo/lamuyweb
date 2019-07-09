<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">

            {!! Form::open(['url' => route('galleries.destroy'), 'method' => 'DELETE']) !!}

            <div class="card-header">
                <div>
                    <h4>ELIMINAR GALERÍAS</h4>
                    <p class="text-info" style="display: inline-block">Seleccione las galerías y presione aquí <i class="mdi mdi-arrow-right"></i> </p>
                    <span title="Eliminar" data-toggle="modal" data-target="#deleteGalleries" class="btn btn-danger btn-xs">Eliminar</span>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteGalleries" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar {!! ucfirst($modelSpanishPlural) !!}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Desea eliminar las {!! $modelSpanishPlural !!} seleccionadas?</p>
                                </div>
                                <div class="modal-footer">
                                    <button title="Eliminar" type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    @forelse($galleries as $gallery)

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 text-center">

                            {{--<i class="mdi mdi-folder mdi-48px text-warning" style="display: block"></i>--}}
                            @if($gallery->mainImageThumb())
                                <img src="{{ route('imagenes.ver', $gallery->mainImage()->path) }}" style="width: 100%">
                                <p style="margin-top: 13px">{!! $gallery->name !!}</p>
                            @else
                                <img src="{!! asset('images/noimage.png') !!}" style="width: 100%">
                                <p>{!! $gallery->name !!}</p>
                            @endif

                            {!! Form::checkbox('galleries[]', $gallery->id, false) !!}

                        </div>

                    @empty

                        <div class="col-lg-12">
                            <p class="text-secondary">
                                Todavía no hay ninguna galería creada
                                <a href="{!! route($modelPlural.'.create') !!}">crear</a>
                            </p>
                        </div>

                    @endforelse
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>