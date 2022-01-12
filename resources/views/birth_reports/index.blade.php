@extends('layouts.app')
@section('title')
    {{ __('messages.birth_report.birth_reports') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.birth_report.birth_reports') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.birth_report.new_birth_report') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('birth_reports.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('birth_reports.templates.templates')
        @include('birth_reports.create_modal')
        @include('birth_reports.edit_modal')
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
        let birthReportUrl = "{{ url('birth-reports') }}";
        let birthReportCreateUrl = "{{ route('birth-reports.store') }}";
        let patientUrl = "{{ url('patients') }}";
        let doctorUrl = "{{ url('doctors') }}";
        let caseUrl = "{{ url('patient-cases') }}";
    </script>
    <script src="{{mix('assets/js/birth_reports/birth_reports.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/birth_reports/create-edit.js') }}"></script>
@endsection

