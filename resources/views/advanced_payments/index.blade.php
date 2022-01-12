@extends('layouts.app')
@section('title')
    {{ __('messages.advanced_payment.advanced_payments') }}
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
                <h3 class="page__heading">{{ __('messages.advanced_payment.advanced_payments') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.advanced_payment.new_advanced_payment') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('advanced_payments.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('advanced_payments.templates.templates')
        @include('advanced_payments.create_modal')
        @include('advanced_payments.edit_modal')
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
        let advancedPaymentUrl = "{{url('advanced-payments')}}";
        let advancePaymentCreateUrl = "{{ route('advanced-payments.store') }}";
        let patientUrl = "{{ url('patients') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{ mix('assets/js/advanced_payments/advanced_payments.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/advanced_payments/create-edit.js') }}"></script>
@endsection
