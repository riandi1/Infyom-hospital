@extends('layouts.app')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            @include('flash::message')
            <div class="mt-4">
                <h4><strong>{{ __('messages.settings') }}</strong></h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card border-0">
                            <div class="card-body px-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{ (isset($sectionName) && $sectionName == 'general') ? 'active' : ''}}"
                                           href="{{ route('settings.edit', ['section' => 'general']) }}">{{ __('messages.general') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ (isset($sectionName) && $sectionName == 'sidebar_setting') ? 'active' : ''}}"
                                           href="{{ route('settings.edit', ['section' => 'sidebar_setting']) }}">{{ __('messages.sidebar_setting') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9">
                        @yield('section')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
        let moduleUrl = '{{ route('module.index') }}';
        let imageValidation = '{{  __('messages.setting.image_validation') }}';
    </script>
    <script src="{{ mix('assets/js/settings/setting.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
