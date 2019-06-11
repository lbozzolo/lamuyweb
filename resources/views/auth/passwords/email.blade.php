<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{!! config('app.name') !!} - Reseteo de contraseña</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('staradmin/css/style.css') }}">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" type="text/css" />

    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('staradmin/images/favicon.png') }}" />

    <style type="text/css">

        .auth.auth-bg-1 {
            background: url({{ asset('template-web/images/login.jpg') }});
            background-size: cover;
        }

    </style>

</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">

                        <div class="card-body text-center">
                            <img src="{{ asset('images/logos/logo.png') }}" alt="logo" style="width: 100%" class="img-responsive" />
                        </div>
                        <div class="card-body">
                            <p class="text-success text-center">Ingrese su email y le enviaremos un enlace para restaurar su contraseña.</p>
                            <form action="{{ url('/password/email') }}" method="post">
                                {!! csrf_field() !!}


                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            <i class="fa fa-btn fa-envelope"></i> Enviar
                                        </button>
                                        <a href="{!! route('login') !!}" class="btn btn-default">Cancelar</a>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                    <p class="footer-text text-center">copyright © 2019 Verticedigital. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('staradmin/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
<script src="{{ asset('staradmin/js/misc.js') }}"></script>
<!-- endinject -->
</body>

</html>
