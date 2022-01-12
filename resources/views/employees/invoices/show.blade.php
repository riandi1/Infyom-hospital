@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.invoice_details') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.invoice.invoice_details') }}</h3>
                <div class="filter-container">
                    <a href="{{ url()->previous() }}"
                       class="btn btn-secondary filter-container__btn mx-2">
                        {{ __('messages.common.back') }}
                    </a>
                    <a class="btn btn-success pull-right" target="_blank"
                       href="{{ url('employee/invoices/'.$invoice->id.'/pdf') }}">{{ __('messages.invoice.print_invoice') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('employees.invoices.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
