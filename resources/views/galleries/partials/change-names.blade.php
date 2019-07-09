<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">

            <div class="card-header">
                <h4>CAMBIAR NOMBRES DE GALERÍAS</h4>
                <p class="text-info">Modifique el nombre de la galería y presione 'cambiar'</p>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Carpeta</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($galleries as $gallery)
                            <tr>
                                <td>
                                    <i class="mdi mdi-folder mdi-48px text-warning"></i>
                                    <span>{!! $gallery->name !!}</span>
                                </td>
                                <td>

                                    {!! Form::model($gallery, ['url' => route($modelPlural.'.update', $gallery->id), 'method' => 'put']) !!}

                                    <div class="input-group col-xs-12">
                                        <input name="name" type="text" value="{!! $gallery->name !!}" class="form-control file-upload-info">
                                        <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-xs btn-success" type="submit"><i class="mdi mdi-check"></i> cambiar</button>
                                            </span>
                                    </div>

                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>