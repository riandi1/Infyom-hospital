@extends('layouts.app')
@section('title')
    {{ __('messages.appointment.appointment_calendar') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.appointment.appointment_calendar') }}</h3>
                <div class="flex-end-sm">
                    <a href="{{ route('appointments.index') }}" class="btn btn-primary">
                        {{ __('messages.appointment.appointment_list') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Appointment show modal --}}
    <div id="appointmentDetailModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.appointment.appointment_details') }}</h5>
                    <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6 mb-0">
                            {{ Form::label('patient_name', __('messages.case.patient').':', ['class' => 'font-weight-bold']) }}
                            <p id="patientName"></p>
                        </div>
                        <div class="form-group col-sm-6 mb-0">
                            {{ Form::label('department_name', __('messages.appointment.doctor_department').':', ['class' => 'font-weight-bold']) }}
                            <p id="departmentName"></p>
                        </div>
                        <div class="form-group col-sm-6 mb-0">
                            {{ Form::label('doctor_name', __('messages.case.doctor').':', ['class' => 'font-weight-bold']) }}
                            <p id="doctorName"></p>
                        </div>
                        <div class="form-group col-sm-6 mb-0">
                            {{ Form::label('opd_date', __('messages.appointment.date').':', ['class' => 'font-weight-bold']) }}
                            <br>
                            <p id="opdDate"></p>
                        </div>
                        <div class="form-group col-sm-12 mb-0">
                            {{ Form::label('problem', __('messages.appointment.description').':', ['class' => 'font-weight-bold']) }}
                            <p id="problem"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{mix('assets/js/appointment_calendar/appointment_calendar.js')}}"></script>
@endsection
