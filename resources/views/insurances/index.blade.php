@extends('layouts.app')
@section('title')
    {{ __('messages.insurance.insurances') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.insurance.insurances') }}</h3>
                <div class="filter-container">
                    <div class="mr-2">
                        <label for="filter_status" class="lbl-block"><b>{{ __('messages.common.status') }}</b></label>
                        {{Form::select('status', $statusArr, null, ['id' => 'filter_status', 'class' => 'form-control status-filter']) }}
                    </div>
                    @if(Auth::user()->hasRole('Receptionist'))
                        <div class="mr-0 actions-btn">
                            <div class="btn-group" role="group">
                                <button id="insurancesActions" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ __('messages.common.actions') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="insurancesActions"
                                     x-placement="bottom-start">
                                    <a href="{{ route('insurances.create') }}" class="dropdown-item">
                                        {{ __('messages.insurance.new_insurance') }}
                                    </a>
                                    <a href="{{ route('insurances.excel') }}" class="dropdown-item">
                                        {{ __('messages.common.export_to_excel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-primary filter-container__btn" href="{{ route('insurances.create') }}">
                            {{ __('messages.insurance.new_insurance') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('insurances.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('insurances.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let insuranceUrl = "{{ url('insurances') }}";
    </script>
    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>
    <script src="{{mix('assets/js/insurances/insurances.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

