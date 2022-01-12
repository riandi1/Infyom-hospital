@extends('layouts.app')
@section('title')
    {{ __('messages.investigation_report.new_investigation_report') }}
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
                            <strong>{{ __('messages.investigation_report.new_investigation_report') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'investigation-reports.store', 'files' => 'true', 'id' => 'createInvestigationForm']) }}

                            @include('investigation_reports.fields')

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
    <script src="{{ mix('assets/js/investigation_reports/create-edit.js') }}"></script>
@endsection 
