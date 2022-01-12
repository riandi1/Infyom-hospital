@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patients') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.opd_patients') }}</h3>
                <div class="filter-container">
                    <a href="{{ route('opd.patient.create') }}" class="btn btn-primary filter-container__btn">
                        {{ __('messages.opd_patient.new_opd_patient') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @include('opd_patient_departments.table')
                        <div class="pull-right mr-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('opd_patient_departments.templates.templates')
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let opdPatientUrl = "{{url('opds')}}";
        let patientUrl = "{{url('patients')}}";
        let doctorUrl = "{{url('doctors')}}";
    </script>
    <script src="{{ mix('assets/js/opd_patients/opd_patients.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection
