@extends('layouts.app')
@section('title')
    {{ __('messages.front_settings') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.min.css') }}">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            @include('flash::message')
            <div class="mt-4">
                <h4><strong>{{ __('messages.front_settings') }}</strong></h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card border-0">
                            <div class="card-body px-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item border-bottom">
                                        <a class="nav-link {{ (isset($sectionName) && $sectionName == 'about_us') ? 'active' : ''}}"
                                           href="{{ route('front.settings.index', ['section' => 'about_us']) }}">{{ __('messages.about_us') }}</a>
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
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let isEdit = true;
        let moduleUrl = '{{ route('module.index') }}';
        let imageValidation = '{{  __('messages.setting.image_validation') }}';
    </script>
    <script src="{{ mix('assets/js/front_settings/front_settings.js') }}"></script>
@endsection
