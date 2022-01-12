@extends('layouts.app')
@section('title')
    {{ __('messages.call_log.edit') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
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
                            <strong>{{ __('messages.call_log.edit') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($callLog, ['route' => ['call_logs.update', $callLog->id], 'method' => 'patch', 'id' => 'editCallLogForm']) }}
                            @include('call_logs.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let callLogUrl = "{{ route('call_logs.index') }}";
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
    </script>
    <script src="{{ mix('assets/js/call_logs/create-edit.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
