@extends('layouts.app')
@section('title')
    {{ __('messages.payment.payment_reports') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.payment.payment_reports') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filterPaymentAccount"
                               class="lbl-block"><b>{{ __('messages.account.type') }}</b></label>
                        {{ Form::select('account_type',$accountTypes,null,['id'=>'filterPaymentAccount','class'=>'form-control status-filter']) }}
                    </div>
                    @if(Auth::user()->hasRole('Admin'))
                        <a class="btn btn-primary filter-container__btn" href="{{ route('payment.report.excel') }}">
                            {{ __('messages.common.export_to_excel') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('payment_reports.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let paymentReportUrl = "{{ url('payment-reports') }}";
    </script>
    <script src="{{mix('assets/js/payment_reports/payments_reports.js')}}"></script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
@endsection

