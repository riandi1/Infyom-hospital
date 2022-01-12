@extends('layouts.app')
@section('title')
    {{ __('messages.bill.bill_details') }}
@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div class="animated fadeIn">
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.bill.bill_details') }}</h3>
                <div class="filter-container">
                    <a href="{{ route('bills.edit', ['bill' => $bill->id]) }}"
                       class="btn btn-primary filter-container__btn">
                        {{ __('messages.bill.edit') }}
                    </a>
                    <a href="{{ route('bills.index') }}"
                       class="btn btn-secondary filter-container__btn ml-2">
                        {{ __('messages.common.back') }}
                    </a>
                    <a class="btn btn-success pull-right ml-2" target="_blank"
                       href="{{ route('bills.pdf',['bill' => $bill->id]) }}">{{ __('messages.bill.print_bill') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('bills.show_fields')
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>
@endsection
