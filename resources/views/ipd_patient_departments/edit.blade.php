@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.edit_ipd_patient') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.ipd_patient.edit_ipd_patient') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($ipdPatientDepartment, ['route' => ['ipd.patient.update', $ipdPatientDepartment->id], 'method' => 'patch', 'id' => 'editIpdPatientDepartmentForm']) }}

                            @include('ipd_patient_departments.edit_fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let patientCasesUrl = "{{ route('patient.cases.list') }}";
        let patientBedsUrl = "{{ route('patient.beds.list') }}";
        let isEdit = true;
        let ipdPatientBedId = "{{ $ipdPatientDepartment->bed_id }}";
        let ipdPatientBedTypeId = "{{ $ipdPatientDepartment->bed_type_id }}";
    </script>
    <script src="{{mix('assets/js/ipd_patients/create.js')}}"></script>
@endsection
