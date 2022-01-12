<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="{{config('app.name')}}">

    <meta name="keywords" content="Hospital Management System"/>

    <meta name="description" content="Hospital Management System | HMS"/>
    <meta name="author" content="hms.infyom.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}">

    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons/css/simple-line-icons.css') }}">
    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>

    @yield('page_css')
    @yield('css')
</head>
<body>
<div class="infy-loader d-none" id="overlay-screen-lock">
    @include('loader')
</div>
@include('web.layouts.header')
@yield('content')
@include('web.layouts.footer')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
</script>
@yield('page_scripts')
@yield('scripts')
</body>
</html>
