@extends('layouts.app')
@section('title')
    {{ __('messages.vaccinated_patients') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.vaccinated_patients') }}</h3>
                <div class="flex-end-sm">
                    <a class="btn btn-primary filter-container__btn" href="#" data-toggle="modal"
                       data-target="#addModal">
                        {{ __('messages.vaccinated_patient.add_vaccinate_patient') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('vaccinated_patients.table')
                        </div>
                        @include('vaccinated_patients.add_modal')
                        @include('vaccinated_patients.edit_modal')
                        @include('vaccinated_patients.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script>
        let vaccinatedPatientCreateUrl = "{{ route('vaccinated-patients.store') }}";
        let vaccinatedPatientUrl = "{{ route('vaccinated-patients.index') }}";
        let patientUrl = "{{ url('patients') }}";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/vaccinated_patients/vaccinated_patients.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
