@extends('layouts.app')
@section('title')
    {{ __('messages.live_meetings') }}
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
                <h3 class="page__heading"> {{ __('messages.live_meetings') }}</h3>
                @if (getLoggedInUser()->hasRole(['Admin', 'Doctor']))
                    <div class="flex-end-sm">
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                           data-target="#addModal">{{ __('messages.live_consultation.new_live_meeting') }}</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('live_consultations.member_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('live_consultations.templates.templates')
        @include('live_consultations.add_meeting_modal')
        @include('live_consultations.edit_meeting_modal')
        @include('live_consultations.start_meeting_modal')
        @include('live_consultations.show_meeting_modal')
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
        let liveMeetingUrl = "{{ route('live.meeting.index') }}";
        let liveMeetingCreateUrl = "{{ route('live.meeting.store') }}";
        let doctorRole = "{{getLoggedInUser()->hasRole('Doctor')?true:false}}";
        let adminRole = "{{getLoggedInUser()->hasRole('Admin')?true:false}}";
    </script>
    <script src="{{mix('assets/js/live_consultations/live_meetings.js')}}"></script>
    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
