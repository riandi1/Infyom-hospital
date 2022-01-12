@extends('layouts.app')
@section('title')
    {{ __('messages.item_category.item_categories') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="page-header">
                <h3 class="page__heading">{{ __('messages.item_category.item_categories') }}</h3>
                <div class="flex-end-sm">
                    <a href="#" class="btn btn-primary" data-toggle="modal"
                       data-target="#addModal">{{ __('messages.item_category.new_item_category') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('item_categories.table')
                        </div>
                        @include('item_categories.modal')
                        @include('item_categories.edit_modal')
                    </div>
                </div>
            </div>
        </div>
        @include('item_categories.templates.templates')
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let itemCategoryCreateUrl = "{{ route('item-categories.store') }}";
        let itemCategoriesUrl = "{{ url('item-categories') }}";
    </script>
    <script src="{{ mix('assets/js/item_categories/item_categories.js') }}"></script>
    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>
@endsection
