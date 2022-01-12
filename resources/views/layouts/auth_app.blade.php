<!DOCTYPE html>
<html>
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{getAppName()}}</title>
    <meta name="description" content="Hospital management system">
    <meta name="keyword" content="hospital,doctor,patient,fever,MD,MS,MBBS">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/coreui.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons/css/simple-line-icons.css') }}">
    <link href="{{ mix('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body class="app flex-row align-items-center">
<div class="container">
    @yield('content')
</div>

<!-- CoreUI and necessary plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/coreui.min.js') }}"></script>
<script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
@yield('scripts')
</body>
</html>
