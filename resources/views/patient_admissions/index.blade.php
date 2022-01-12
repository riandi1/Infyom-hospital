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
                        {{Form::select('status', $statusArr, 2, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="patientAdmissionsActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="patientAdmissionsActions"
                                 x-placement="bottom-start">
                                <a href="{{ route('patient-admissions.create') }}" class="dropdown-item">
                                    {{ __('messages.patient_admission.new_patient_admission') }}
                                </a>
                                @if(Auth::user()->hasRole('Admin|Doctor|Case Manager|Receptionist'))
                                    <a href="{{ route('patient.admissions.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('patient_admissions.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('patient_admissions.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let patientAdmissionsUrl = "{{url('patient-admissions')}}";
        let patientUrl = "{{url('patients')}}";
        let doctorUrl = "{{url('doctors')}}";
        let packageUrl = "{{url('packages')}}";
        let insuranceUrl = "{{url('insurances')}}";
        let userRole = "{{Auth::user()->hasRole('Case Manager')?true:false}}";
    </script>
    <script src="{{ mix('assets/js/patient_admissions/patient_admission.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
