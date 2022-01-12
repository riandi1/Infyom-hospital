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
                    <a href="{{ route('invoices.edit', ['invoice' => $invoice->id]) }}"
                       class="btn btn-primary filter-container__btn">
                        {{ __('messages.invoice.edit') }}
                    </a>
                    <a href="{{ route('invoices.index') }}"
                       class="btn btn-secondary filter-container__btn mx-2">
                        {{ __('messages.common.back') }}
                    </a>
                    <a class="btn btn-success pull-right" target="_blank" href="{{ route('invoices.pdf',['invoice' => $invoice->id]) }}">{{ __('messages.invoice.print_invoice') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('invoices.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
