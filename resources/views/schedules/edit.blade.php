@extends('layouts.app')
@section('title')
    {{ __('messages.schedule.edit') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.schedule.edit') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($schedule, ['route' => ['schedules.update', $schedule->id], 'method' => 'patch', 'id' => 'createScheduleForm']) }}

                            @include('schedules.fields')

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
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/schedules/create-edit.js') }}"></script>
@endsection
