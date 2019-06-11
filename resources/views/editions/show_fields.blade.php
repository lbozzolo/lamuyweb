<div class="card">

    <div class="card-body">


        <div class="row">
            @if($item->url_cover)
                <div class="col-lg-4 text-right">
                    <img src="{{ route('cover.ver', $item->url_cover) }}" class="img-responsive" style="width: 100%">
                </div>
            @else
                <div class="col-lg-4" style="border: 1px solid lightgrey; padding: 20px 30px">
                    <p class="lead text-default">No hay imagen <br>de portada cargada.</p>
                </div>
            @endif

            <div class="col-lg-8">

                <span>
                    @if($item->active)
                        <label class="badge badge-success">{!! ($gender == 'M')? 'activo' : 'activa' !!}</label>
                    @else
                        <label class="badge badge-danger">{!! ($gender == 'M')? 'inactivo' : 'inactiva' !!}</label>
                    @endif
                </span>
                <small class="mr-2" style="padding: 5px">creado el {!! $item->fecha_creado !!}</small>
                <h4>{!! $item->title !!}</h4>
                <p>{!! ($item->description)? $item->description : '<small class="text-muted">No hay ninguna descripción</small>' !!}</p>
                <hr>
                <ul>
                    <li>Número de la edición: {!! $item->number !!}</li>
                    <li>Fecha de la edición: {!! $item->date_formatted !!}</li>
                    @if(isset($item) && $item->url_pdf)
                        <li>
                            PDF de la edición:
                            <a href="{!! route('pdf.ver', $item->url_pdf) !!}" target="_blank">
                            <span class="text-primary">
                                <i class="mdi mdi-file-pdf-box mdi-18px"></i> {!! $item->url_pdf !!}
                            </span>
                            </a>
                        </li>
                    @else
                        <li><em class="text-muted">todavía no se ha cargado un pdf</em> </li>
                    @endif
                </ul>

                <a href="{!! route($modelPlural.'.edit', $item->id) !!}" class="btn btn-outline-primary"><i class="mdi mdi-pencil"></i> Editar</a>
                <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-default">Cancelar</a>

            </div>
        </div>

    </div>

</div>
