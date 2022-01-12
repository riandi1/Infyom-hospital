@extends('layouts.app')
@section('title')
    {{ __('messages.ambulance.edit_ambulance') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.ambulance.edit_ambulance') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($ambulance, ['route' => ['ambulances.update', $ambulance->id], 'method' => 'patch', 'id' => 'editAmbulanceForm']) }}

                            @include('ambulances.edit_fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
    </script>
    <script src="{{ mix('assets/js/ambulances/create-edit.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
