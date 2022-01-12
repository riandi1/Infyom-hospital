@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_category.radiology_categories') }}
@endsection

@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.radiology_category.radiology_categories') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.radiology_category.new_radiology_category') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('radiology_categories.table')
                        </div>
                        @include('radiology_categories.modal')
                        @include('radiology_categories.edit_modal')
                        @include('radiology_categories.templates.templates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let radiologyCategoryCreateUrl = "{{ route('radiology.category.store') }}";
        let radiologyCategoryUrl = "{{ url('radiology-categories') }}";
    </script>
    <script src="{{ mix('assets/js/radiology_categories/radiology_categories.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
