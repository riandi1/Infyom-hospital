@extends('layouts.app')
@section('title')
    {{ __('messages.payment.payments') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.payment.payments') }}</h3>
                <div class="mr-0">
                    <div class="btn-group" role="group">
                        <button id="paymentActions" type="button" class="btn btn-primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{ __('messages.common.actions') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="paymentActions" x-placement="bottom-start">
                            <a href="{{ route('payments.create') }}" class="dropdown-item">
                                {{ __('messages.payment.new_payment') }}
                            </a>
                            @if(Auth::user()->hasRole('Admin|Accountant'))
                                <a href="{{ route('payments.excel') }}" class="dropdown-item">
                                    {{ __('messages.common.export_to_excel') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('payments.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('payments.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let paymentUrl = "{{ url('payments') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/payments/payments.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

