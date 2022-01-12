@extends('layouts.app')
@section('title')
    {{ __('messages.bill.bills') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.bill.bills') }}</h3>
                <div class="filter-container">
                    <a href="{{ route('bills.create') }}" class="btn btn-primary filter-container__btn">
                        {{ __('messages.bill.new_bill') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('bills.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('bills.templates.templates')
    </div>
@endsection
@section('page_scripts')
    {{-- Both JS need for load datatble --}}
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let billUrl = "{{route('bills.index')}}";
        let patientUrl = "{{url('patients')}}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/bills/bill.js')}}"></script>
    <script src="{{mix('assets/js/custom/new-edit-modal-form.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
@endsection
