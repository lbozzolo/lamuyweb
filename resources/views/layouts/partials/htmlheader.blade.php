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
<!-- endinject -->
{{--<link rel="shortcut icon" href="{{ asset('staradmin/images/favicon.png') }}" />--}}
{{--<link rel="shortcut icon" href="{{ asset('staradmin/images/logo_icon.png') }}" />--}}
<link rel="shortcut icon" href="{{ asset('staradmin/images/icons/apple-icon-57x57.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('staradmin/images/icons/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('staradmin/images/icons/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('staradmin/images/icons/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('staradmin/images/icons/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('medias') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('staradmin/images/icons/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('media') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('staradmin/images/icons/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('staradmin/images/icons/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('staradmin/images/icons/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('staradmin/images/icons/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('staradmin/images/icons/favicon-16x16.png') }}">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" href="{{ asset('selectize/dist/css/selectize.css') }}" />

<link href="{{ asset('/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/styles.css') }}" rel="stylesheet" type="text/css" />

<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.3/sifter.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.js"></script>

<link rel="stylesheet" href="{{ asset('croppie/croppie.css') }}" />
<link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}" />


<style type="text/css">

    body .popover{display:none !important; }

</style>


@yield('css')



