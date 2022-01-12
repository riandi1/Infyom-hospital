@extends('layouts.app')
@section('title')
    {{ __('messages.live_consultations') }}
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
                <h3 class="page__heading"> {{ __('messages.live_consultations') }}</h3>
                @if (getLoggedInUser()->hasRole('Admin'))
                    <div class="flex-end-sm">
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                           data-target="#addModal">{{ __('messages.live_consultation.new_live_consultation') }}</a>
                    </div>
                @endif
                @if(getLoggedInUser()->hasRole('Doctor'))
                    <div class="flex-end-sm">
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                           data-target="#addModal">{{ __('messages.live_consultation.new_live_consultation') }}</a>
                        <a href="#"
                           class="btn btn-primary add-credential">{{ __('messages.live_consultation.add_credential') }}</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('live_consultations.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('live_consultations.templates.templates')
        @include('live_consultations.add_modal')
        @include('live_consultations.edit_modal')
        @include('live_consultations.start_modal')
        @include('live_consultations.show_consultation_modal')
        @include('live_consultations.add_credential_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let liveConsultationUrl = "{{ route('live.consultation.index') }}";
        let liveConsultationTypeNumber = "{{ route('live.consultation.list') }}";
        let liveConsultationCreateUrl = "{{ route('live.consultation.store') }}";
        let zoomCredentialCreateUrl = "{{ route('zoom.credential.create') }}";
        let doctorRole = "{{getLoggedInUser()->hasRole('Doctor')?true:false}}";
        let adminRole = "{{getLoggedInUser()->hasRole('Admin')?true:false}}";
        let patientRole = "{{getLoggedInUser()->hasRole('Patient')?true:false}}";
    </script>
    <script src="{{mix('assets/js/live_consultations/live_consultations.js')}}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
