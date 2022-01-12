@extends('layouts.app')
@section('title')
    {{ __('messages.charges') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.charges') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status"
                               class="lbl-block"><b>{{ __('messages.charge_category.charge_type') }}</b></label>
                        {{Form::select('charge_type', $filterChargeTypes, null, ['id' => 'chargeType', 'class' => 'form-control status-filter']) }}
                    </div>
                    @if(Auth::user()->hasRole('Receptionist'))
                        <div class="mr-0 actions-btn">
                            <div class="btn-group" role="group">
                                <button id="chargesActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="chargesActions" x-placement="bottom-start">
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addModal">
                                        {{ __('messages.charge.new_charge') }}
                                    </a>
                                    <a href="{{ route('charges.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-primary filter-container__btn" href="#" data-toggle="modal"
                           data-target="#addModal">
                            {{ __('messages.charge.new_charge') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('charges.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('charges.templates.templates')
        @include('charges.create_modal')
        @include('charges.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let chargeCategoryUrl = "{{ url('charge-categories') }}";
        let chargeUrl = "{{ url('charges') }}";
        let chargeCreateUrl = "{{ route('charges.store') }}";
        let changeChargeTypeUrl = "{{ url('get-charge-categories') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{mix('assets/js/charges/charges.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/charges/create-edit.js') }}"></script>
@endsection

