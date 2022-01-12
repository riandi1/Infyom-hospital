<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{getAppName()}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="google" content="notranslate">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset('assets/css/coreui.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('favicon.ico') }}">
    @yield('page_css')
    <link href="{{ mix('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
@include('layouts.header')
@include('user_profile.edit_profile_modal')
@include('user_profile.change_password_modal')
<div class="infy-loader" id="overlay-screen-lock">
    @include('loader')
</div>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
        @yield('content')
    </main>
</div>
@include('layouts.footer')
</body>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/coreui.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
@yield('page_scripts')
<script>
    const defaultImageUrl = '';
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
        $('#overlay-screen-lock').hide();
    }(jQuery));
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
</script>
@yield('scripts')
<script>
    let profileUrl = "{{ url('profile') }}";
    let profileUpdateUrl = "{{ url('profile-update') }}";
    let changePasswordUrl = "{{ url('change-password') }}";
    let loggedInUserId = "{{ getLoggedInUserId() }}";
    let updateLanguageURL = "{{ url('update-language')}}";
    let currentCurrency = "{{ getCurrencySymbol()}}";
    let pdfDocumentImageUrl = "{{ asset('assets/img/pdf.png') }}";
    let docxDocumentImageUrl = "{{ asset('assets/img/doc.png') }}";
    let ajaxCallIsRunning = false;
    let userCurrentLanguage = "{{ getLoggedInUser()->language }}";
</script>
<script src="{{ mix('assets/js/user_profile/user_profile.js') }}"></script>
</html>
