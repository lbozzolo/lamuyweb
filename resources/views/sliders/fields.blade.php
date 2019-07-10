<!-- Name Field -->
<div class="form-group col-lg-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-lg-6 ">
    {!! Form::label('text_active', 'Texto visible') !!}<br>

    {!! Form::checkbox('text_active') !!}
    <label style="padding-top: 6px">Activar</label>
</div>

@if(isset($item))
<div class="form-group col-lg-12 ">
    <table class="table table-striped table-bordered">
        <tbody>
        @foreach($item->imagesBig as $key => $image)

            <tr>
                <td style="width: 10%"><img src="{!! route('imagenes.ver', $image->path) !!}" style="border-radius: 0px!important; width: 64px"></td>
                <td>
                    <label for="main_text">Texto principal IMAGEN {!! $key + 1 !!}</label>
                    {!! Form::text('main_text['.$image->id.']', ($image->texts()->first())? $image->texts()->first()->pivot->main_text : null, ['class' => 'form-control']) !!}
                </td>
                <td>
                    <label for="main_text">Texto secundario IMAGEN {!! $key + 1 !!}</label>
                    {!! Form::text('secondary_text['.$image->id.']', ($image->texts()->first())? $image->texts()->first()->pivot->secondary_text : null, ['class' => 'form-control']) !!}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
@endif

<div class="form-group col-lg-12" >
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($modelPlural.'.index') !!}" class="btn btn-default">Cancelar</a>
</div>
