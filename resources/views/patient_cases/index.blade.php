@extends('layouts.app')
@section('title')
    {{ __('messages.cases') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.cases') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, 2, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    @if(Auth::user()->hasRole('Receptionist|Case Manager'))
                        <div class="mr-0 actions-btn">
                            <div class="btn-group" role="group">
                                <button id="patientCaseActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="patientCaseActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('patient-cases.create') }}" class="dropdown-item">
                                        {{ __('messages.case.new_case') }}
                                    </a>
                                    <a href="{{ route('patient.cases.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-primary filter-container__btn" href="{{ route('patient-cases.create') }}">
                            {{ __('messages.case.new_case') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('patient_cases.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('patient_cases.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let casesUrl = "{{ url('patient-cases') }}";
        let doctorUrl = "{{ url('doctors') }}";
        let patientUrl = "{{ url('patients') }}";
        let userRole = "{{Auth::user()->hasRole('Case Manager')?true:false}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/patient_cases/patient_cases.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection


