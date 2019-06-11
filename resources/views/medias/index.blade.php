@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">

            <h1>
                Media
                <a class="btn btn-primary btn-sm" href="{!! route('medias.create') !!}">Agregar</a>
            </h1>

            <div id="drop-area">
                <h3>Drag and Drop Files Here</h3>>
                {!! Form::open(['url' => route('medias.upload.images'), 'method' => 'post']) !!}
                    <input type="file" title="Click to add Files">
                    {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>


        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('uploader-master/src/js/jquery.dm-uploader.js') }}"></script>

    <script>

        var url = 'medias/upload/images';
        $("#drop-area").dmUploader({
            url: 'medias/upload/images',
            //... More settings here...

            onInit: function(){
                console.log('Callback: Plugin initialized');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    type: 'POST',
                    url: url,
                    data: '',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        //$("#profile-pic").attr("src","/images/icon-cam.png");
                    }
                });

            }


        });

    </script>

@endsection
