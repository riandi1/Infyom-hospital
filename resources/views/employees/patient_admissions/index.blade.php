@extends('layouts.app')
@section('title')
    {{ __('messages.patient_admissions') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.patient_admissions') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('employees.patient_admissions.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('employees.patient_admissions.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let patientAdmissionsUrl = "{{url('employee/patient-admissions')}}";
        let patientUrl = "{{url('patients')}}";
        let packageUrl = "{{url('packages')}}";
        let insuranceUrl = "{{url('insurances')}}";
    </script>
    <script src="{{ mix('assets/js/employee/patient_admission.js') }}"></script>
@endsection
