@extends('layouts.app')
@section('title')
    {{ __('messages.investigation_report.investigation_reports') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.investigation_report.investigation_reports') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    <a class="btn btn-primary filter-container__btn px-xs-5 font-sm"
                       href="{{ route('investigation-reports.create') }}">
                        {{ __('messages.investigation_report.new_investigation_report') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('investigation_reports.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('investigation_reports.templates.templates')
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let investigationReportUrl = "{{url('investigation-reports')}}";
        let patientUrl = "{{ url('patients') }}";
        let doctorUrl = "{{ url('doctors') }}";
        let downloadDocumentUrl = "{{ url('investigation-download') }}";
    </script>
    <script src="{{ mix('assets/js/investigation_reports/investigation_reports.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
