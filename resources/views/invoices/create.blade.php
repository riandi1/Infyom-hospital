@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.new_invoice') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('css')
    <link href="{{ asset('assets/css/bill.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
            <div class="alert alert-danger display-none" id="validationErrorsBox"></div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('messages.invoice.new_invoice') }}</strong>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'invoices.store', 'id' => 'invoiceForm', 'name' => 'invoiceForm']) }}

                            @include('invoices.fields')

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('invoices.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let invoiceSaveUrl = "{{route('invoices.store')}}";
        let invoiceUrl = "{{route('invoices.index')}}";
        let patients = JSON.parse('@json($patients)');
        let accounts = JSON.parse('@json($associateAccounts)');
        let uniqueId = 2;
        let invoiceDate = moment().format('YYYY-MM-DD');
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/invoices/new.js')}}"></script>
@endsection
