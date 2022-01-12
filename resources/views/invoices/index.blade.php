@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.invoices') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.invoice.invoices') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="status_filter" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status',$statusArr,null,['id'=>'status_filter','class'=>'form-control status-filter'])  }}
                    </div>
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary filter-container__btn">
                        {{ __('messages.invoice.new_invoice') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('invoices.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('invoices.templates.templates')
@endsection
@section('page_scripts')
    {{-- Both JS need for load datatble --}}
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let invoiceUrl = "{{route('invoices.index')}}";
        let patientUrl = "{{ url('patients') }}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/invoices/invoice.js')}}"></script>
    <script src="{{mix('assets/js/custom/new-edit-modal-form.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>
@endsection
