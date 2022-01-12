@extends('layouts.app')
@section('title')
    {{ __('messages.appointment.edit_appointment') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
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
                            <strong>{{ __('messages.appointment.edit_appointment') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::model($appointment, ['route' => ['appointments.update', $appointment->id], 'method' => 'patch', 'id' => 'editAppointmentForm']) }}

                            @include('appointments.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('appointments.templates.appointment_slot')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let doctorDepartmentUrl = "{{ url('doctors-list') }}";
        let doctorScheduleList = "{{ url('doctor-schedule-list') }}";
        let getBookingSlot = "{{ route('get.booking.slot') }}";
        let isEdit = true;
        let isCreate = false;
        let appointmentIndexPage = "{{ route('appointments.index') }}";
        let appointmentEditId = "{{ $appointment->id }}";
        let appointmentSaveUrl = "{{route('appointments.update', ['appointment' => $appointment->id])}}";
    </script>
    <script src="{{mix('assets/js/appointments/create-edit.js')}}"></script>
@endsection
