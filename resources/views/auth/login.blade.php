<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - Panel de control</title>
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
    <link rel="shortcut icon" href="{{ asset('images') }}" />

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
                            <form action="{{ url('/login') }}" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="label">Email</label>
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                                        <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Contraseña</label>
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="*********">
                                        <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary submit-btn btn-block">Ingresar</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input" checked> Recordarme
                                        </label>
                                    </div>
                                    <a href="{{ url('/password/reset') }}" class="text-small forgot-password text-black">Olvidé mi contraseña</a>
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