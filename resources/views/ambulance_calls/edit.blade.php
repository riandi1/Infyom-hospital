@extends('layouts.app')
@section('title')
    {{ __('messages.ambulance_call.edit_ambulance_call') }}
@endsection
@section('page_css')
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
                            <strong>{{ __('messages.ambulance_call.edit_ambulance_call') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($ambulanceCall, ['route' => ['ambulance-calls.update', $ambulanceCall->id], 'method' => 'patch', 'id' => 'editAmbulanceCall']) }}

                            @include('ambulance_calls.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script>
        let getDriverNameUrl = "{{ route('driver.name') }}";
    </script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/ambulance_call/create-edit.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
