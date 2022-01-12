@extends('layouts.app')
@section('title')
    {{ __('messages.charge_category.charge_categories') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.charge_category.charge_categories') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.charge_category.new_charge_category') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('charge_categories.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('charge_categories.templates.templates')
        @include('charge_categories.create_modal')
        @include('charge_categories.edit_modal')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let chargeCategoryUrl = "{{ url('charge-categories') }}";
        let chargeCategoryCreateUrl = "{{ route('charge-categories.store') }}";
    </script>
    <script src="{{mix('assets/js/charge_categories/charge_categories.js')}}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
    <script src="{{ mix('assets/js/charge_categories/create-edit.js') }}"></script>
@endsection

