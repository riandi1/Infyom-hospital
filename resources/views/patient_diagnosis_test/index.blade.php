@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.patient_diagnosis_test') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.patient_diagnosis_test.patient_diagnosis_test') }}</h3>
                @if(Auth::user()->hasRole('Receptionist|Lab Technician'))
                    <div class="mr-0">
                        <div class="btn-group" role="group">
                            <button id="patientDiagnosesTestActions" type="button"
                                    class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="patientDiagnosesTestActions"
                                 x-placement="bottom-start">
                                <a href="{{ route('patient.diagnosis.test.create') }}" class="dropdown-item">
                                    {{ __('messages.patient_diagnosis_test.new_patient_diagnosis_test') }}
                                </a>
                                <a href="{{ route('patient.diagnosis.test.excel') }}" class="dropdown-item">
                                    {{ __('messages.common.export_to_excel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex-end-sm">
                        <a class="btn btn-primary filter-container__btn"
                           href="{{ route('patient.diagnosis.test.create') }}">
                            {{ __('messages.patient_diagnosis_test.new_patient_diagnosis_test') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('patient_diagnosis_test.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('patient_diagnosis_test.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let patientDiagnosisTestUrl = "{{url('patient-diagnosis-test')}}";
        let diagnosisCategoryUrl = "{{ url('diagnosis-categories') }}";
    </script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/patient_diagnosis_test/patient_diagnosis_test.js') }}"></script>
@endsection
