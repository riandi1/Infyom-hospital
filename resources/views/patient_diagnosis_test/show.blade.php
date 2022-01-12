@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.patient_diagnosis_test') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div class="filter-container">
                    <a class="btn btn-success pull-right" target="_blank"
                       href="{{route('patient.diagnosis.test.pdf',['patientDiagnosisTest' => $patientDiagnosisTest->id])}}">Print
                        Diagnosis Test</a>
                    <a href="{{ url('patient-diagnosis-test') }}"
                       class="btn btn-primary pull-right ml-2">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.patient_diagnosis_test.patient_diagnosis_test_details') }}</strong>
                        </div>
                        <div class="card-body">
                            @include('patient_diagnosis_test.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
