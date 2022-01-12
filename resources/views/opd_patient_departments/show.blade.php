@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patient.opd_patient_details') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection

@section('css')
    <link href="{{ asset('assets/css/timeline.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="d-flex justify-content-end py-2">
                <div>
                    <a href="{{ url()->previous() }}"
                       class="btn btn-primary pull-right">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.opd_patient.opd_patient_details') }}</strong>
                        </div>
                        <div class="card-body">
                            @include('opd_patient_departments.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('opd_diagnoses.add_modal')
    @include('opd_diagnoses.edit_modal')
    @include('opd_diagnoses.templates.templates')
    @include('opd_patient_departments.templates.templates')
    @include('opd_timelines.add_modal')
    @include('opd_timelines.edit_modal')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let visitedOPDPatients = "{{ route('opd.patient.index') }}";
        let opdPatientUrl = "{{url('opds')}}";
        let doctorUrl = "{{url('doctors')}}";
        let patient_id = "{{ $opdPatientDepartment->patient_id }}";
        let opdPatientDepartmentId = "{{ $opdPatientDepartment->id }}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";
        let opdDiagnosisCreateUrl = "{{route('opd.diagnosis.store')}}";
        let opdDiagnosisUrl = "{{route('opd.diagnosis.index')}}";
        let downloadDiagnosisDocumentUrl = "{{ url('opd-diagnosis-download')}}";
        let opdTimelineCreateUrl = "{{route('opd.timelines.store')}}";
        let opdTimelinesUrl = "{{route('opd.timelines.index')}}";
        let opdPatientCaseDate = "{{ $opdPatientDepartment->patientCase->date }}";
        let id = "{{ $opdPatientDepartment->id }}";
        let appointmentDate = "{{ $opdPatientDepartment->appointment_date }}";
    </script>
    <script src="{{ mix('assets/js/opd_tab_active/opd_tab_active.js') }}"></script>
    <script src="{{ mix('assets/js/opd_patients/visits.js') }}"></script>
    <script src="{{ mix('assets/js/opd_diagnosis/opd_diagnosis.js') }}"></script>
    <script src="{{ mix('assets/js/opd_timelines/opd_timelines.js') }}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
@endsection
