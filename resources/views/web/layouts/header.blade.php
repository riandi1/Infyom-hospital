@if(session('status'))
    <div class="alert alert-success m-0 contactSuccess text-center"><h5 class="m-0">{{ session('status') }}</h5></div>
@section('page_scripts')
    <script src="{{ mix('assets/js/web/web.js') }}"></script>
@endsection
@endif
{{-- News container starts --}}
@if(!empty($todayNotice))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0 m-0">
                <h5 class="p-0 m-0 py-1 news">
                    <marquee>{{ $todayNotice->description }}</marquee>
                </h5>
            </div>
        </div>
    </div>
@endif
{{-- News container ends --}}

<div class="container-fluid nav-bg">
    <div class="row">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand pl-3" href="{{ url('/') }}">
                    <img src="{{ asset('web/img/logo.jpg') }}" class="d-inline-block align-top img-fluid logo-size"
                         alt="hms-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto font-weight-bold">
                        <li class="nav-item active">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                               href="{{ url('/') }}">{{ __('web.home') }}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link {{ Request::is('appointment') ? 'active' : '' }}"
                               href="{{ route('appointment') }}">{{ __('messages.appointments') }}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}"
                               href="{{ route('contact') }}">{{ __('messages.contact_us') }}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}"
                               href="{{ route('aboutUs') }}">{{ __('web.about_us') }}</a>
                        </li>
                        <li class="nav-item simple-menu">
                            <div class="nav-link language-name">
                                <span><i class="fas fa-language"></i> {{ getCurrentLanguageName() }}</span>
                                <div class="language-contents">
                                    @foreach(getLanguages() as $key => $value)
                                        @if(checkLanguageSession() != $key)
                                            <a href="javascript:void(0)" class="language-menu languageSelection"
                                               data-prefix-value="{{ $key }}">{{ strtoupper($value) }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @auth
                            @role('Admin')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ route('dashboard') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Patient')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('patient/my-cases') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Doctor')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('employee/doctor') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Nurse')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('bed-types') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Receptionist')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('appointments') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Pharmacist')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('employee/doctor') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Accountant')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('accounts') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Case Manager')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('employee/doctor') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                            @role('Lab Technician')
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm"
                                   href="{{ url('employee/doctor') }}">{{ getLoggedInUser()->full_name }}</a>
                            </li>
                            @endrole
                        @else
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm" href="{{ route('login') }}">{{ __('web.login') }}</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="login btn btn-sm ml-2"
                                   href="{{ route('register') }}">{{ __('web.register') }}</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
