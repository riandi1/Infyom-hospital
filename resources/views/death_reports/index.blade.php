@extends('layouts.app')
@section('title')
    {{ __('messages.death_report.death_reports') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.death_report.death_reports') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.death_report.new_death_report') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('death_reports.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('death_reports.templates.templates')
        @include('death_reports.create_modal')
        @include('death_reports.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let deathReportUrl = "{{ url('death-reports') }}";
        let deathReportCreateUrl = "{{ route('death-reports.store') }}";
        let patientUrl = "{{ url('patients') }}";
        let doctorUrl = "{{ url('doctors') }}";
        let caseUrl = "{{ url('patient-cases') }}";
    </script>
    <script src="{{mix('assets/js/death_reports/death_reports.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/death_reports/create-edit.js') }}"></script>
@endsection
