@extends('layouts.app')
@section('title')
    {{ __('messages.appointments') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.appointments') }}</h3>
                <div class="filter-container">
                    <div class="d-flex flex-column mr-2">
                        <label class=""><b>{{ __('messages.common.status') }}</b></label>
                        {{ Form::select('status',$statusArr,false,['id' => 'status', 'class' => 'form-control']) }}
                    </div>
                    <div class="mr-0 actions-btn">
                        <div class="btn-group" role="group">
                            <button id="appointmentActions" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('messages.common.actions') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="appointmentActions" x-placement="bottom-start">
                                <a href="{{ route('appointment-calendars.index') }}" class="dropdown-item">
                                    {{ __('messages.appointment.calendar_view') }}
                                </a>
                                @if (Auth::user()->hasRole(['Admin', 'Receptionist','Patient']))
                                    <a href="{{ route('appointments.create') }}" class="dropdown-item">
                                        {{ __('messages.appointment.new_appointment') }}
                                    </a>
                                @endif
                                @if (Auth::user()->hasRole('Patient|Doctor|Receptionist'))
                                    <a href="{{ route('appointments.excel') }}" class="dropdown-item">
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
                            @include('appointments.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('appointments.templates.templates')
    </div>
@endsection
@section('page_scripts')
    {{-- Both JS need for load datatble --}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let appointmentUrl = "{{ url('appointments') }}";
        let patientUrl = "{{ url('patients') }}";
        let doctorUrl = "{{ url('doctors') }}";
        let doctorShowUrl = "{{url('employee/doctor')}}";
        let patientRole = "{{Auth::user()->hasRole('Patient')?true:false}}";
        let doctorRole = "{{Auth::user()->hasRole('Doctor')?false:true}}";
        let loginDoctor = "{{Auth::user()->hasRole('Doctor')?true:false}}";
        let adminRole = "{{Auth::user()->hasRole('Admin')?true:false}}";
        let doctorDepartmentUrl = "{{ url('doctor-departments') }}";
    </script>
    @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Doctor'))
        <script src="{{mix('assets/js/appointments/appointments.js')}}"></script>
    @else
        <script src="{{mix('assets/js/appointments/patient_appointment.js')}}"></script>
    @endif
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

