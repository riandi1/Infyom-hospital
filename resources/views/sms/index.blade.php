@extends('layouts.app')
@section('title')
    {{__('messages.sms.sms')}}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading"> {{__('messages.sms.sms')}}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#AddModal">{{__('messages.sms.new_sms')}}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('sms.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sms.templates.templates')
        @include('sms.create_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let smsUrl = "{{url('sms')}}";
        let createSmsUrl = "{{route('sms.store')}}";
        let getUsersListUrl = "{{ route('sms.users.lists') }}";
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
    </script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/sms/sms.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
