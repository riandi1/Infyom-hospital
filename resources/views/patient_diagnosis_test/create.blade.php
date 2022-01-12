@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.patient_diagnosis_test') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.patient_diagnosis_test.new_patient_diagnosis_test') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'patient.diagnosis.test.store', 'id'=>'patientDiagnosisTestForm']) }}

                            @include('patient_diagnosis_test.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('patient_diagnosis_test.templates.templates')
    </div>
@endsection
@section('scripts')
    <script>
        let patientDiagnosisTestSaveUrl = "{{route('patient.diagnosis.test.store')}}";
        let patientDiagnosisTest = "{{route('patient.diagnosis.test.index')}}";
        let uniqueId = 2;
    </script>
    <script src="{{ mix('assets/js/patient_diagnosis_test/create-edit.js') }}"></script>
@endsection
