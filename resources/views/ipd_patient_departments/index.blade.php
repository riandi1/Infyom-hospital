@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.ipd_patients') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.ipd_patient.ipd_patients') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter ']) }}
                    </div>
                    <a href="{{ route('ipd.patient.create') }}"
                       class="btn btn-primary filter-container__btn px-xs-5 font-xs-sm btnIpdPatient">
                        {{ __('messages.ipd_patient.new_ipd_patient') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @include('ipd_patient_departments.table')
                        <div class="pull-right mr-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('ipd_patient_departments.templates.templates')
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let ipdPatientUrl = "{{url('ipds')}}";
        let patientUrl = "{{url('patients')}}";
        let doctorUrl = "{{url('doctors')}}";
        let bedUrl = "{{url('beds')}}";
    </script>
    <script src="{{ mix('assets/js/ipd_patients/ipd_patients.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
